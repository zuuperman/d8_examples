<?php
/**
 * @file
 * Contains \Drupal\d8_examples\Controller\ExampleController.
 */

namespace Drupal\d8_examples\Controller;

/**
 * @class
 * A Controller for the example module.
 */
class ExampleController {

  /**
   * Show a homepage.
   */
  public function homepage() {
    return array('#markup' => 'homepage content');
  }

  /**
   * Show a page also contains a form.
   */
  public function exampleForm() {

    $build = array();
    $build['markup'] = array('#markup' => 'intro text');

    $build['form'] = \Drupal\Core\Form\FormBuilder()->getForm('d8_examples_example_form');

    return $build;

  }
}