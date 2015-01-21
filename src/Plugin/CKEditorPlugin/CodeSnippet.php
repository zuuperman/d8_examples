<?php

/**
 * @file
 * Contains \Drupal\d8_examples\Plugin\CKEditorPlugin\Codesnippet.
 */

namespace Drupal\d8_examples\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "codesnippet" plugin.
 *
 * @CKEditorPlugin(
 *   id = "codesnippet",
 *   label = @Translation("Codesnippet"),
 *   module = "ckeditor"
 * )
 */
class CodeSnippet extends CKEditorPluginBase {

  /**
   * Method that needs to return file to your plugin js file.
   *
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'd8_examples') . '/js/ckeditor/codesnippet/plugin.js';
  }

  /**
   * Method for additional ck editor config.
   *
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return array(
    );
  }

  /**
   * Method that needs to return all buttons for your plugin.
   *
   * {@inheritdoc}
   */
  public function getButtons() {
    return array(
      'CodeSnippet' => array(
        'label' => t('Codesnippet'),
        'image' => drupal_get_path('module', 'd8_examples') . '/js/ckeditor/codesnippet/icons/codesnippet.png',
      ),
    );
  }

}
