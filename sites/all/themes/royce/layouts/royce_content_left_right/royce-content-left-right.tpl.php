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

<main id="main" role="main" class="wrapper--main panel-layout l-content-left-right <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

  <div class="wrapper wrapper--content">
    <div class="l-container">

      <section class="l-content__section">

        <div class="l-content__inner">
          <?php print $content['content-section']; ?>
        </div>

      </section>

      <aside class="l-content__aside-one">

        <div class="l-content__inner">
          <?php print $content['content-aside-one']; ?>
        </div>

      </aside>

      <aside class="l-content__aside-two">

        <div class="l-content__inner">
          <?php print $content['content-aside-two']; ?>
        </div>

      </aside>

    </div>
  </div>

</main>
