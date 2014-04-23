<?php

/**
 * @file
 * Definition of the 'Simple Green' panel style.
 */

$plugin = array(
  'title' => t('Simple green background and padding'),
  'description' => t('Wraps panes with green background and padding.'),
  'render pane' => 'panels_style_green_padded_render_pane',
  'weight' => -10,
);

/**
 * Theme function for the pane style.
 */
function theme_panels_style_green_padded_render_pane($vars) {
  $content = $vars['content'];
  $pane = $vars['pane'];
  $display = $vars['display'];
  $plugin = $vars['style'];

  $content->css_class .= ' pane--padded pane--green';

  // if the style is gone or has no theme of its own, just display the output.
  return theme('panels_pane', array('content' => $content, 'pane' => $pane, 'display' => $display));
}
