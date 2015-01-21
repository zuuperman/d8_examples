<?php

/**
 * @file
 * Definition of Drupal\d8_examples\Plugins\views\filter\UpdatedThisMonth.
 */

namespace Drupal\d8_examples\Plugin\views\filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\filter\FilterPluginBase;

/**
 * Filter on nodes updated this month.
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("updated_this_month")
 */
class UpdatedThisMonth extends FilterPluginBase {

  /**
   * No admin summary needed for the plugin.
   *
   * {@inheritdoc}
   */
  public function adminSummary() { }

  /**
   * No operators for this plugin.
   *
   * {@inheritdoc}
   */
  protected function operatorForm(&$form, FormStateInterface $form_state) { }

  /**
   * {@inheritdoc}
   */
  public function canExpose() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    $table = $this->ensureMyTable();
    $this->query->addWhereExpression($this->options['group'], 'MONTH(FROM_UNIXTIME(' . $table . '.changed)) = MONTH(NOW())');
  }

}
