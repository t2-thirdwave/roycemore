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
  <?php print $content['header']; ?>


<main id="main" role="main" class="wrapper--main panel-layout royce-homepage <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

<?php if (!empty($content['update1'])): ?>

  <div class="wrapper wrapper--update">
    <section class="l-container royce-homepage__section">

      <div class="l-grid4-1">
        <div class="royce-homepage-inner">
          <?php print $content['update1']; ?>
        </div>
      </div>

      <div class="l-grid4-2">
        <div class="royce-homepage-inner">
          <?php print $content['update2']; ?>
        </div>
      </div>

      <div class="l-grid4-3">
        <div class="royce-homepage-inner">
          <?php print $content['update3']; ?>
        </div>
      </div>

      <div class="l-grid4-4">
        <div class="royce-homepage-inner">
          <?php print $content['update4']; ?>
        </div>
      </div>

    </section>
  </div>

<?php endif; ?>

<?php if ($content['specialitem1'] || $content['specialitem2']|| $content['specialitem3']): ?>

  <div class="wrapper wrapper--special">
    <section class="l-container royce-homepage__section">

      <div class="l-grid3-1">
        <div class="royce-homepage-inner">
          <?php print $content['specialitem1']; ?>
        </div>
      </div>

      <div class="l-grid3-2">
        <div class="royce-homepage-inner">
          <?php print $content['specialitem2']; ?>
        </div>
      </div>

      <div class="l-grid3-3">
        <div class="royce-homepage-inner">
          <?php print $content['specialitem3']; ?>
        </div>
      </div>

    </section>
  </div>

<?php endif; ?>

<?php if (!empty($content['video1'])): ?>

  <div class="wrapper wrapper--video">
    <section class="l-container royce-homepage__section">

      <div class="l-grid4-1">
        <div class="royce-homepage-inner">
          <?php print $content['video1']; ?>
        </div>
      </div>

      <div class="l-grid4-2">
        <div class="royce-homepage-inner">
          <?php print $content['video2']; ?>
        </div>
      </div>

      <div class="l-grid4-3">
        <div class="royce-homepage-inner">
          <?php print $content['video3']; ?>
        </div>
      </div>

      <div class="l-grid4-4">
        <div class="royce-homepage-inner">
          <?php print $content['video4']; ?>
        </div>
      </div>

    </section>
  </div>

<?php endif; ?>

<?php if (!empty($content['map'])): ?>

  <div class="wrapper wrapper--map">
    <section class="royce-homepage__map">
      <?php print $content['map']; ?>
    </section>
  </div>

<?php endif; ?>

</main>
