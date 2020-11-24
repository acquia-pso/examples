<?php

namespace Drupal\example_2_routing\Controller;

use Drupal\user\Entity\User;

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
    $user = User::load($current_user->id());
    if ($user->uid->vale > 0) {
      return ['#markup' => "Hello " . $user->name->value];
    }
    else {
      return ['#markup' => "Hello Anonymous"];
    }

  }

}
