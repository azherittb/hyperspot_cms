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
class MyEventBookingController extends ControllerBase {

  public function myEventBook(NodeInterface $node) {
    $date = $node->get('field_date')->getString();
    $arrival = $node->get('field_time')->getString();
    $persons = $node->get('field_persons')->getString();

    $reservation['date'] = array(
      '#markup' => $this->t($date),
    );
    $reservation['arrival'] = array(
      '#markup' => $this->t($arrival),
    );
    $reservation['persons'] = array(
      '#markup' => $this->t($persons),
    );
//    $build = array(
//      '#theme' => 'my_reservation_confirm',
//      '#items' => $reservation,
//    );
    return $build;
  }

}
