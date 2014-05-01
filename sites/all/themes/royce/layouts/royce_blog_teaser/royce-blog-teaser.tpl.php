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

<div class="wrapper panel-layout royce-blog--teaser <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print 'id="' . $css_id . '"'; } ?>>

<?php if (!empty($content['content-header'])): ?>
  <div class="royce-content__header">
    <?php print $content['content-header']; ?>
  </div>
<?php endif; ?>

  <div class="royce-content__info">
    <?php if (!empty($content['content-author'])): ?>
      <div class="royce-content__author">
        <div class="royce-content-inner">
          <?php print $content['content-author']; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['content-date'])): ?>
      <div class="royce-content__date">
        <div class="royce-content-inner">
          <?php print $content['content-date']; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['content-categories'])): ?>
      <div class="royce-content__categories">
        <div class="royce-content-inner">
          <?php print $content['content-categories']; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['content-social'])): ?>
      <div class="royce-content__social">
        <div class="royce-content-inner">
          <?php print $content['content-social']; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div class="royce-content__teaser">
    <?php print $content['content-teaser']; ?>
  </div>

</div>

