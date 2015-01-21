<?php

/**
 * @file
 * Contains \Drupal\d8_examples\Plugin\DsField\DemoField.
 */


namespace Drupal\d8_examples\Plugin\DsField;

use Drupal\Core\Form\FormStateInterface;
use Drupal\ds\Plugin\DsField\DsFieldBase;

/**
 * Plugin that renders a demo field.
 *
 * @DsField(
 *   id = "demofield",
 *   title = @Translation("Demofield"),
 *   entity_type = "node"
 * )
 */
class DemoField extends DsFieldBase {

  /**
   * Method to use when your ds field has extra settings.
   *
   * {@inheritdoc}
   */
  public function settingsForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    $settings['text'] = array(
      '#type' => 'textfield',
      '#title' => 'Extra text to show',
      '#default_value' => $config['text'],
    );

    return $settings;
  }

  /**
   * Method for showing a summary in the field UI table.
   *
   * {@inheritdoc}
   */
  public function settingsSummary($settings) {
    $config = $this->getConfiguration();

    $summary = array();
    if (!empty($config['text'])) {
      $summary[] = 'Extra text: yes';
    }
    else {
      $summary[] = 'Extra text: no';
    }

    return $summary;
  }

  /**
   * The default configuration for your field.
   *
   * {@inheritdoc}
   */
  public function defaultConfiguration() {

    $configuration = array(
      'text' => ''
    );

    return $configuration;
  }

  /**
   * Build the output for your field.
   *
   * {@inheritdoc}
   */
  public function build() {

    $config = $this->getConfiguration();

    $output = 'demo field';

    if (!empty($config['text'])) {
      $output .= 'extra text:' . $config['text'];
    }

    return array('#markup' => $output);

  }

}
