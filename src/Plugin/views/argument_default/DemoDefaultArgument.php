<?php

/**
 * @file
 * Contains \Drupal\d8_examples\Plugin\views\argument_default\DemoDefaultArgument.
 */

namespace Drupal\d8_examples\Plugin\views\argument_default;

use Drupal\views\Plugin\CacheablePluginInterface;
use Drupal\views\Plugin\views\argument_default\ArgumentDefaultPluginBase;

/**
 * Provide a hardcoded list of nids.
 * This plugin implements CacheablePluginInterface to notify views that
 * this argument can be cached.
 *
 * @ViewsArgumentDefault(
 *   id = "demo_default_argument",
 *   title = @Translation("Demo Default Argument")
 * )
 */
class DemoDefaultArgument extends ArgumentDefaultPluginBase implements CacheablePluginInterface {

  /**
   * Get the default argument.
   * Example: All nids that are connected with current page based on the context.
   * A D7 example of this can be found in Natuurmonumenten: views_plugin_argument_gebied_reference.inc
   *
   * {@inheritdoc}
   */
  public function getArgument() {
    return '1+2+3';
  }

  /**
   * Argument is cachable.
   *
   * {@inheritdoc}
   */
  public function isCacheable() {
    return TRUE;
  }

  /**
   * Context to use for the cache. (cache per url)
   *
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return ['cache.context.url'];
  }

}
