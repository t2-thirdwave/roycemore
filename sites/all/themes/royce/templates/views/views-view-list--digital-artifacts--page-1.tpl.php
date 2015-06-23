<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php print $list_type_prefix; ?>
    <?php foreach ($rows as $id => $row): ?>
        <?php
        $classes_for_mix = "";
        $pieces = explode(",", $view->style_plugin->rendered_fields[$index]['field_digital_artifact_descripti']);
        foreach ($pieces as $p) $classes_for_mix .= " pr_cat_$p";
        ?>
      <li class="<?php print $classes_array[$id]; ?> <?=$classes_for_mix?> mix mix_all" data-cat="<?=$id?>"><?php print $row; ?></li>
    <?php endforeach; ?>
    <li class="gap"></li>
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>