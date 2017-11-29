<?php

/**
 * @file
 * Contains \Drupal\hyperspot_core\Controller\MyProfilePageController.
 */

namespace Drupal\hyperspot_core\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class MyProfilePageController extends ControllerBase {

  public function myProfileView() {
    $profile = array(
      '#markup' => 'Hello, world! Profile View.',
    );
    return $profile;
  }

  public function myProfileEdit() {
    $profile = array(
      '#markup' => 'Hello World! Profile Edit.',
    );
    return $profile;
  }
}
