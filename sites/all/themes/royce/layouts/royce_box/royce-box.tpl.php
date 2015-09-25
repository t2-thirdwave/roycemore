<?php
/**
 * @file
 * Template for Panopoly Boxton.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>
<main id="main" role="main" class="wrapper--main panel-layout royce-box <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>
  <section class="royce-content__section">
    <?php if (!empty($content['contentmain'])): ?>
    <div class="l-content__body">
      <div class="container">
        <div class="l-container-inside">
          <?php print $content['contentmain']; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </section>
</main>