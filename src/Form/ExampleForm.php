<?php

/**
 * @file
 * Contains \Drupal\d8_examples\Form\ExampleForm.
 */

namespace Drupal\d8_examples\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Example system settings form.
 */
class ExampleForm extends FormBase {

  /**
   * The form id to use for building this form.
   *
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'd8_examples_example_form';
  }

  /**
   * Build the form.
   *
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['checkboxes'] = array(
      '#type' => 'checkboxes',
      '#options' => array(
        'a' => 'A',
        'b' => 'B',
        'c' => 'C',
      ),
      '#title' => $this->t('Check at least 2 checkboxes'),
      '#required' => TRUE,
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    );

    return $form;
  }

  /**
   * Validate the form.
   *
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    $selected_checkboxes = array_filter($form_state->getValue('checkboxes'));

    // Set an error on the checkboxes element.
    if (count($selected_checkboxes) < 2) {
      $form_state->setErrorByName('checkboxes', $this->t('Please select at least 2 checkboxes'));
    }

  }

  /**
   * Submit the form.
   *
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    drupal_set_message($this->t('Values selected: !selected', array('!selected' => implode(', ', array_filter($form_state->getValue('checkboxes'))))));

    // Redirect to the homepage
    $form_state->setRedirect('d8_examples.homepage');

  }

}

