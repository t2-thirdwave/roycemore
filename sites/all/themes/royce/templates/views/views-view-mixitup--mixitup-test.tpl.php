<?php
/**
 * @file
 * Default view template to display content with MixItUp.
 */
?>

<div class="wrapper wrapper--digital-artifacts">
  <div class="l-container">
  <?php if (isset($filters)): ?>
    <div class="filters_wrapper"><?php print $filters; ?></div>
  <?php endif; ?>
    <div class="miu_container">
      <?php foreach ($rows as $id => $row): ?>
        <div class="mix_item mix<?php print ($classes_array[$id]) ? ' ' . $classes_array[$id] : ''; ?> <?php print ' ' . $view->result[$id]->classes; ?>" <?php print isset($view->result[$id]->sorts) ? $view->result[$id]->sorts : ''; ?>>
          <div class="mix_item--inside">
            <?php print $row; ?>  
          </div>          
        </div>
      <?php endforeach; ?>
      <div class="gap"></div>
      <div class="gap"></div>
    </div>    
  </div>
</div>