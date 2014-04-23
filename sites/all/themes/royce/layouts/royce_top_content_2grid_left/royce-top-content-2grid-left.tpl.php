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

<main id="main" role="main" class="wrapper--main panel-layout royce-top-content-left royce-top-content-2grid-left <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

  <div class="wrapper wrapper--header" style="position: relative;">
    <?php print $content['content-header']; ?>
  </div>

  <div class="wrapper wrapper--content">
    <div class="royce-container">

      <section class="royce-content__section">

        <div class="royce-content__inner">

          <?php if (!empty($content['content-section'])): ?>
            <?php print $content['content-section']; ?>
          <?php endif; ?>

          <?php if (!empty($content['specialitem1'])): ?>
            <div class="2grid clearfix">
            <div class="royce-content__grid1">
              <?php print $content['specialitem1']; ?>
            </div>
            <div class="royce-content__grid2">
              <?php print $content['specialitem2']; ?>
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

      <aside class="royce-content__aside">

        <div class="royce-content__inner">
          <?php print $content['content-aside']; ?>
        </div>

      </aside>

    </div>
  </div>

</main>

