<?php
/**
 * @file
 * Default view template to display content with MixItUp.
 */
?>

<?php if (isset($filters)): ?>
  <div class="controls filters_wrapper"><?php print $filters; ?></div>
<?php endif; ?>

<div class="controls filters_wrapper">
  <label>Filter:</label>
  <button class="filter" data-filter="all">All Projects</button>
  <button class="filter" data-filter=".category-1">Group</button>
  <button class="filter" data-filter=".category-1">Independent</button>

  <button class="filter" data-filter="all">All Projects</button>
  <button class="filter" data-filter=".lower-school">Lower School</button>
  <button class="filter" data-filter=".middle-school">Middle School</button>
  <button class="filter" data-filter=".upper-school">Upper School</button>

  <label>Sort:</label>
  <button class="sort" data-sort="myorder:asc">Asc</button>
  <button class="sort" data-sort="myorder:desc">Desc</button>
</div>

<div class="miu_container">
  <?php foreach ($rows as $id => $row): ?>
    <div class="mix_item mix<?php print ($classes_array[$id]) ? ' ' . $classes_array[$id] : ''; ?> <?php print ' ' . $view->result[$id]->classes; ?>">
      <?php print $row; ?>
    </div>
  <?php endforeach; ?>  
  <div class="gap"></div>
  <div class="gap"></div>
</div>


