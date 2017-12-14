<?php

/**
 * @file
 * Contains \Drupal\hyperspot_core\Controller\MyEventBookingController.
 */

namespace Drupal\hyperspot_core\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

/**
 * Provides route responses for the Example module.
 */
class MyEventBookingController extends ControllerBase {

  public function myEventBook(NodeInterface $node) {
    $url = \Drupal::request()->getHost();
    $home_link = \Drupal::l(t("DONE"), $url . '/home');

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
    $reservation['done'] = array(
      '#type' => 'markup',
      '#markup' => '<div class=done>' . $home_link . '</div>',
    );
    $build = array(
      '#theme' => 'my_event_confirm',
      '#items' => $reservation,
    );

    return $build;
  }

}
