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

<main id="main" role="main" class="wrapper--main panel-layout royce-blog <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

  <section class="royce-content__section">

    <?php if (!empty($content['content-image'])): ?>
    <div class="l-content__image">
      <div class="l-container">
        <?php print $content['content-image']; ?>
      </div>
    </div>
    <?php endif; ?>


    <div class="l-content__header">
      <div class="l-container">
        <div class="l-container-inside">
          <?php print $content['content-title']; ?>
          <?php if (!empty($content['content-info'])): ?>
          <div class="royce-content__info">
            <?php print $content['content-info']; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php if (!empty($content['content-body'])): ?>
    <div class="l-content__body">
      <div class="l-container">
        <div class="l-container-inside">
          <?php print $content['content-body']; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </section>

</main>
