<?php

/**
 * @file
 * Provides views data for training module.
 */

/**
 * Implements hook_views_data_alter()().
 */
function training_module_views_data_alter(&$data) {

  // Add our custom filter to the node_field_data table.
  $data['node_field_data']['updated_this_month'] = array(
    'title' => t('Updated this month'),
    'help' => t('Show nodes updated this month'),

    'filter' => array(
      'id' => 'updated_this_month',
    ),
  );

}

