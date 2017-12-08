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
    $tid = $node->get('field_restaurant')->getValue();

    $term = \Drupal\taxonomy\Entity\Term::load($tid[0]['target_id']);
    $restaurant = $term->getName();
    $date = $node->get('field_date')->getString();
    $arrival = $node->get('field_arrival')->getString();
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
    $build = array(
      '#theme' => 'my_reservation_confirm',
      '#items' => $reservation,
    );
    return $build;
  }

}
