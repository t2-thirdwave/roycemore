<?php

/**
 * @file
 * Builds placeholder replacement tokens for webform-related data.
 */

/**
 * Implements hook_token_info().
 */
function webform_token_info() {
  // Webform submission tokens.
  $info['types']['submission'] = array(
    'name' => t('Submission'),
    'description' => t('Tokens related to webform submissions.'),
    'needs-data' => 'webform-submission',
  );

  $info['tokens']['submission']['sid'] = array(
    'name' => t('Submission ID'),
    'description' => t('The unique indentifier for the webform submission.'),
  );
  $info['tokens']['submission']['date'] = array(
    'name' => t('Date submitted'),
    'description' => t('The date the webform was submitted.'),
    'type' => 'date',
  );
  $info['tokens']['submission']['ip-address'] = array(
    'name' => t('IP address'),
    'description' => t('The IP address that was used when submitting the webform.'),
  );
  $info['tokens']['submission']['user'] = array(
    'name' => t('Submitter'),
    'description' => t('The user that submitted the webform result.'),
    'type' => 'user',
  );
  $info['tokens']['submission']['url'] = array(
    'name' => t('URL'),
    'description' => t('Webform tokens related to URLs.'),
    'type' => 'url',
  );
  $info['tokens']['submission']['values'] = array(
    'name' => t('Webform submission values'),
    'description' => t('Webform tokens from submitted data. Replace the "?" with the "field key", including any parent field keys separated by colons. You may append ":label" for just the label or ":withlabel" for both the label and value together.'),
    'dynamic' => TRUE,
  );

  return $info;
}

/**
 * Implements hook_tokens().
 */
function webform_tokens($type, $tokens, array $data = array(), array $options = array()) {
  $replacements = array();

  $url_options = array('absolute' => TRUE);
  if (isset($options['language'])) {
    $url_options['language'] = $options['language'];
    $language_code = $options['language']->language;
  }
  else {
    $language_code = NULL;
  }

  $sanitize = !empty($options['sanitize']);

  // Webform tokens (caching globally).
  if ($type == 'submission' && !empty($data['webform-submission'])) {
    // Prepare all the submission data that we will likely need more than once.
    $submission = $data['webform-submission'];
    $node = isset($data['node']) ? $data['node'] : node_load($submission->nid);
    $email = isset($data['webform-email']) ? $data['webform-email'] : NULL;
    $excluded_components = isset($email['excluded_components']) ? $email['excluded_components'] : array();
    $format = $sanitize ? 'html' : 'text';

    // Replace individual tokens that have an exact replacement.
    foreach ($tokens as $name => $original) {
      switch ($name) {
        case 'sid':
          $replacements[$original] = $submission->sid;
          break;
        case 'date':
          $replacements[$original] = format_date($submission->submitted, 'medium', '', NULL, $language_code);
          break;
        case 'ip-address':
          $replacements[$original] = $sanitize ? check_plain($submission->remote_addr) : $submission->remote_addr;
          break;
        case 'user':
          $account = user_load($submission->uid);
          $name = format_username($account);
          $replacements[$original] = $sanitize ? check_plain($name) : $name;
          break;
        case 'url':
          $replacements[$original] = url("node/{$node->nid}/submission/{$submission->sid}", $url_options);
          break;
        case 'edit-url':
          $replacements[$original] = url("node/{$node->nid}/submission/{$submission->sid}/edit", $url_options);
          break;
        case 'values':
          $submission_renderable = webform_submission_render($node, $submission, $email, $format, $excluded_components);
          $replacements[$original] = drupal_render($submission_renderable);
          break;
      }
    }

    // Webform submission tokens for individual components.
    if ($value_tokens = token_find_with_prefix($tokens, 'values')) {
      // Get the full submission renderable without $excluded_components so that
      // individually referenced values are available.
      $submission_renderable = webform_submission_render($node, $submission, $email, $format);

      foreach ($value_tokens as $name => $original) {
        foreach ($node->webform['components'] as $cid => $component) {
          // Build the list of parents for this component.
          $parents = ($component['pid'] == 0) ? array($component['form_key']) : webform_component_parent_keys($node, $component);
          $parent_token = implode(':', $parents);
          if (strpos($name, $parent_token) === 0) {
            // An exact match.
            if (strcmp($name, $parent_token) === 0) {
              $match = TRUE;
              $modifier = NULL;
            }
            // Check if this matches the key plus a modifier.
            else {
              $modifier = substr($name, strrpos($name, ':') + 1);
              // TODO: Allow components to provide additional modifiers per
              // type, i.e. key, day, hour, minute, etc.
              $available_modifiers = array(
                'label',
                'withlabel',
                'nolabel',
              );
              if (strcmp($name, $parent_token . ':' . $modifier) === 0 && in_array($modifier, $available_modifiers)) {
                $match = TRUE;
              }
              else {
                $match = FALSE;
              }
            }

            if ($match) {
              // Drill down into the renderable to find the element.
              $display_element = $submission_renderable;
              foreach ($parents as $parent) {
                if (isset($display_element[$parent])) {
                  $display_element = $display_element[$parent];
                }
                // Sometimes an element won't exist in the submission renderable
                // due to conditional logic. If not found, skip that element.
                else {
                  $display_element = FALSE;
                  break;
                }
              }
              if ($display_element) {
                // Individual tokens always have access granted even if they're
                // not displayed when printing the whole renderable.
                $display_element['#access'] = TRUE;
  
                if ($modifier === 'label') {
                  $replacements[$original] = webform_filter_xss($display_element['#title']);
                }
                else {
                  // Remove theme wrappers for the nolabel modifier.
                  if ($modifier === 'nolabel' || empty($modifier)) {
                    $display_element['#theme_wrappers'] = array();
                  }
                  $replacements[$original] = render($display_element);
                }
                break;
              }
            }

          }
        }

      }
    }

    // Chained token relationships.
    if ($date_tokens = token_find_with_prefix($tokens, 'date')) {
      $replacements += token_generate('date', $date_tokens, array('date' => $submission->submitted), $options);
    }
    if (($user_tokens = token_find_with_prefix($tokens, 'user')) && $account = user_load($submission->uid)) {
      $replacements += token_generate('user', $user_tokens, array('user' => $account), $options);
    }
    if ($url_tokens = token_find_with_prefix($tokens, 'url')) {
      $replacements += token_generate('url', $url_tokens, array('path' => "node/{$node->nid}/submission/{$submission->sid}"), $options);
    }
  }

  return $replacements;
}
