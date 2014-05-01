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

<main id="main" role="main" class="wrapper--main panel-layout l-top-content-left <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

  <div class="wrapper wrapper--header" style="position: relative;">
    <?php print $content['content-header']; ?>
  </div>

  <div class="wrapper wrapper--content">
    <div class="l-container">

      <section class="l-content__section">

        <div class="l-content__inner">
          <?php print $content['content-section']; ?>
        </div>

      </section>

      <aside class="l-content__aside">

        <div class="l-content__inner">
          <?php print $content['content-aside']; ?>
        </div>

      </aside>

    </div>
  </div>

</main>
