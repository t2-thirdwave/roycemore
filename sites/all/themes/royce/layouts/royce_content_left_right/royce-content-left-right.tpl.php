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

<main id="main" role="main" class="wrapper--main panel-layout royce-content-left-right <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

  <div class="wrapper wrapper--content">
    <div class="royce-container">

      <section class="royce-content__section">

        <div class="royce-content__inner">
          <?php print $content['content-section']; ?>
        </div>

      </section>

      <aside class="royce-content__aside-one">

        <div class="royce-content__inner">
          <?php print $content['content-aside-one']; ?>
        </div>

      </aside>

      <aside class="royce-content__aside-two">

        <div class="royce-content__inner">
          <?php print $content['content-aside-two']; ?>
        </div>

      </aside>

    </div>
  </div>

</main>
