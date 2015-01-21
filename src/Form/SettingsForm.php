<?php

/**
 * @file
 * Contains \Drupal\d8_examples\Form\SettingsForm.
 */

namespace Drupal\d8_examples\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Example system settings form.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * The form id to use for building this form.
   *
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'd8_examples_settings_form';
  }

  /**
   * List what settings that will change when saving the form.
   *
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['d8_examples.settings'];
  }

  /**
   * Build the form.
   *
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('d8_examples.settings');

    $form['example_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Example setting'),
      '#default_value' => $config->get('example_setting'),
      '#required' => TRUE,
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // In d8 we need to save the config by ourself, configFormBase only shows the saved message.
    $this->config('d8_examples.settings')
      ->set('example_setting', $form_state->getValue('example_setting'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}

