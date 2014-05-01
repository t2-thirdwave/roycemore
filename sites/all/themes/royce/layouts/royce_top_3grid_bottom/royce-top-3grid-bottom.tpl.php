<?php
/**
 * @file
 * Template for Roycemore Homepage.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<main id="main" role="main" class="wrapper--main panel-layout l-top-3grid-bottom <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

  <div class="wrapper wrapper--content">
    <div class="l-container">

      <section class="royce-content__section">

        <div class="royce-content__inner">

          <?php if (!empty($content['content-section'])): ?>
            <?php print $content['content-section']; ?>
          <?php endif; ?>

          <?php if (!empty($content['specialitem1'])): ?>
            <div class="3grid clearfix">
              <div class="l-grid3-1">
                <?php print $content['specialitem1']; ?>
              </div>
              <div class="l-grid3-2">
                <?php print $content['specialitem2']; ?>
              </div>
              <div class="l-grid3-3">
                <?php print $content['specialitem3']; ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if (!empty($content['content-bottom-section'])): ?>
            <div class="content-bottom-section">
              <?php print $content['content-bottom-section']; ?>
            </div>
          <?php endif; ?>

        </div>

      </section>

    </div>
  </div>

</main>

