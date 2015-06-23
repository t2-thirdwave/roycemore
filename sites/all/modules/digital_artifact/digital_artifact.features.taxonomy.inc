<?php
/**
 * @file
 * digital_artifact.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function digital_artifact_taxonomy_default_vocabularies() {
  return array(
    'project_type' => array(
      'name' => 'Project Type',
      'machine_name' => 'project_type',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'school' => array(
      'name' => 'School',
      'machine_name' => 'school',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
