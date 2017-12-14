<?php

/**
 * @file
 * Contains \Drupal\hyperspot_core\Plugin\Block\BookMyTableBlock.
 */

namespace Drupal\hyperspot_core\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url;

/**
 * Provides a 'BookMyTableBlock' block.
 *
 * @Block(
 *   id = "bookmyevent_block",
 *   admin_label = @Translation("Book My Event"),
 *   category = @Translation("Custom")
 * )
 */
class BookMyEventBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $path = \Drupal::request()->getpathInfo();
    $arg = explode('/', $path);

    $url = Url::fromRoute('hyperspot_core.my_event_booking_form', array('nid' => $arg[2]));
    $internal_link = \Drupal::l(t("I'M Going"), $url);
    return array(
      '#type' => 'markup',
      '#markup' => '<div class=book_my_event>' . $internal_link . '</div>',
    );
  }

}
