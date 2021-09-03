<?php

namespace Drupal\example_4_plugin\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Hello Advanced block.
 *
 * @Block(
 *   id = "hello_advanced_block",
 *   admin_label = @Translation("Hello Advanced Block"),
 *   category = @Translation("GovCon")
 * )
 */
class HelloAdvancedBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'session' => NULL,
      'person' => NULL,
      'text' => NULL,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $form['session'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Session Name'),
      '#default_value' => $this->configuration['session'],
    ];
    $form['person'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Person Name'),
      '#default_value' => $this->configuration['person'],
    ];
    $form['text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Greeting'),
      '#default_value' => $this->configuration['text'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $fields = [
      'person',
      'session',
      'text',
    ];
    foreach ($fields as $field) {
      $this->configuration[$field] = $values[$field];
    }
  }

  /**
   * Builds and returns the renderable array for this block plugin.
   *
   * If a block should not be rendered because it has no content, then this
   * method must also ensure to return no content: it must then only return an
   * empty array, or an empty array with #cache set (with cacheability metadata
   * indicating the circumstances for it being empty).
   *
   * @return array
   *   A renderable array representing the content of the block.
   *
   * @see \Drupal\block\BlockViewBuilder
   */
  public function build() {
    $config = $this->getConfiguration();
    return [
      '#theme' => 'helloadvanced',
      '#text' => $this->configuration['text'],
      '#person' => $this->configuration['person'],
      '#session' => $this->configuration['session'],
    ];
  }

}
