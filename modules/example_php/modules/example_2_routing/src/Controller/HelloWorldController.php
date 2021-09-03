<?php

namespace Drupal\example_2_routing\Controller;

/**
 * @file
 * Provides advanced hello world message functionality.
 */

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HelloWorldController.
 *
 * @package Drupal\example_2_routing\Controller
 */
class HelloWorldController extends ControllerBase {

  /**
   * Say Hello.
   *
   * @return array
   *   Markup.
   */
  public function hello() {
    $current_user = \Drupal::currentUser();
    if ($current_user->isAuthenticated()) {
      return ['#markup' => "Hello " . $current_user->getDisplayName()];
    }
    else {
      return ['#markup' => "Hello Anonymous"];
    }

  }

}
