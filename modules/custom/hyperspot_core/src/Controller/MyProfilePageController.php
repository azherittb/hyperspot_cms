<?php

/**
 * @file
 * Contains \Drupal\hyperspot_core\Controller\MyProfilePageController.
 */

namespace Drupal\hyperspot_core\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

/**
 * Provides route responses for the Example module.
 */
class MyProfilePageController extends ControllerBase {

  public function mySettings() {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    //$user = \Drupal\user\Entity\User::load(2);

    $name = $user->getUsername();
    $roles = $user->getRoles();
    $first_name = $user->get('field_first_name')->value;
    $last_name = $user->get('field_last_name')->value;
    if (!$user->user_picture->isEmpty()) {
      $picture = $user->user_picture->entity->getFileUri();
    }
    else {
      $picture = 'public://default_images/profile-pictures.png';;
    }

    $profile['roles'] = $roles;
    $profile['first_name'] = $first_name;
    $profile['last_name'] = $last_name;
    $profile['picture'] = array(
      '#theme' => 'image_style',
      '#width' => NULL,
      '#height' => NULL,
      '#style_name' => 'thumbnail',
      '#uri' => $picture,
    );

    $build = array(
      '#theme' => 'my_settings',
      '#items' => $profile,
    );
    return $build;
  }

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
