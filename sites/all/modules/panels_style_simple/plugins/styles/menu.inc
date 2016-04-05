<?php

/**
 * @file
 * Definition of the 'Simple' panel style.
 */

$plugin = array(
  'title' => t('Menu Style'),
  'description' => t('Wraps pane with menu style.'),
  'render pane' => 'panels_style_menu_render_pane',
  'weight' => -10,
);

/**
 * Theme function for the pane style.
 */
function theme_panels_style_menu_render_pane($vars) {
  $content = $vars['content'];
  $pane = $vars['pane'];
  $display = $vars['display'];
  $plugin = $vars['style'];

  $content->css_class = ' pane--menu';

  // if the style is gone or has no theme of its own, just display the output.
  return theme('panels_pane', array('content' => $content, 'pane' => $pane, 'display' => $display));
}
