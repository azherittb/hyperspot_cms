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
 *   id = "bookmytable_block",
 *   admin_label = @Translation("Book My Table"),
 *   category = @Translation("Custom")
 * )
 */
class BookMyTableBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $path = \Drupal::request()->getpathInfo();
    $arg = explode('/', $path);

    $url = Url::fromRoute('hyperspot_core.my_reservation_form', array('nid' => $arg[2]));
    $internal_link = \Drupal::l(t('Book My Table'), $url);
    return array(
      '#type' => 'markup',
      '#markup' => '<div class=book_my_table>' . $internal_link . '</div>',
    );
  }

}
