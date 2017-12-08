<?php

/**
 * @file
 * Contains \Drupal\hyperspot_core\Controller\MyReservationController.
 */

namespace Drupal\hyperspot_core\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\node\NodeInterface;

/**
 * Provides route responses for the Example module.
 */
class MyReservationController extends ControllerBase {

  public function myReservation(NodeInterface $node) {
    dsm($node->getTitle());
    $profile = array(
      '#markup' => 'Hello, world! Profile View.',
    );
    return $profile;
  }

}
