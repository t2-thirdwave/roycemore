<?php
/**
 * @file
 * Template for Roycemore Blog Post.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<main id="main" role="main" class="wrapper--main panel-layout l-centered <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

  <div class="l-content__header">
    <div class="l-container">
      <?php print $content['content-header']; ?>
    </div>
  </div>

  <div class="l-content__centered">
    <div class="l-container">
      <?php print $content['content-centered']; ?>
    </div>
  </div>

</main>
