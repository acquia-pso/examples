<?php

namespace Drupal\example_2_routing\Controller;

use Drupal\Core\Session\AccountProxy;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;

/**
 * @file
 * Provides advanced hello world message functionality.
 */


/**
 * Class HelloWorldController.
 *
 * @package Drupal\example_2_routing\Controller
 */
class DependencyInjectionController extends ControllerBase {

  /**
   * Drupal\Core\Session\AccountProxy definition.
   *
   * @var \Drupal\Core\Session\AccountProxy
   */
  protected $currentUser;

  /**
   * {@inheritdoc}
   */
  public function __construct(AccountProxy $current_user) {
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {

    return new static(
      $container->get('current_user')
    );
  }

  /**
   * Say Hello.
   *
   * @return array
   *   Markup.
   */
  public function hello() {
    if ($this->currentUser->isAuthenticated()) {
      return ['#markup' => "Hello " . $this->currentUser->getDisplayName()];
    }
    else {
      return ['#markup' => "Hello Anonymous"];
    }

  }

}
