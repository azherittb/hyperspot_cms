<?php

/**
 * @file
 * Contains \Drupal\hyperspot_core\Controller\MyEventBookingController.
 */

namespace Drupal\hyperspot_core\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\node\NodeInterface;
use Drupal\Core\Url;

/**
 * Provides route responses for the Example module.
 */
class MyEventBookingController extends ControllerBase {

  public function myEventBook(NodeInterface $node) {
//    $url = \Drupal::request()->getHost();
//    $home_link = \Drupal::l(t("I'M Going"), $url.);

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
      '#markup' => '<div class=book_my_event>' . $internal_link . '</div>',
    );
    $build = array(
      '#theme' => 'my_event_confirm',
      '#items' => $reservation,
    );

    return $build;
  }

}
