<?php

/*
  /**
 * @file
 * Contains \Drupal\hyperspot_core\Form\MyProfileForm.
 */

namespace Drupal\hyperspot_core\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;
use Drupal\file\Entity\File;
use Drupal\Core\Session\AccountInterface;

/**
 * Contribute form.
 */
class MyProfileEdit extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'my_profile_edit';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, AccountInterface $user = NULL) {
    $form['roles'] = array('#type' => 'hidden', '#value' => $user->getRoles());
    $form['frist_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#default_value' => $user->get('field_first_name')->value,
    );
    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#default_value' => $user->get('field_last_name')->value,
    );
    $form['phone_number'] = array(
      '#type' => 'tel',
      '#title' => $this->t('Phone Number'),
      '#default_value' => $user->get('field_phone_number')->value,
    );
    $form['e_mail'] = array(
      '#type' => 'email',
      '#title' => $this->t('E- Mail'),
      '#default_value' => $user->getEmail(),
    );
    $form['address'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Address'),
      '#rows' => 1,
      '#cols' => 10,
      '#default_value' => $user->get('field_address')->value,
    );
    $form['state'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('State'),
      '#default_value' => $user->get('field_state')->value,
    );
    $form['city'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('City'),
      '#default_value' => $user->get('field_city')->value,
    );
    $form['zipcode'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Zip Code'),
      '#default_value' => $user->get('field_zip_code')->value,
    );
    $form['country'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Country'),
      '#default_value' => $user->get('field_country')->value,
    );
    $form['picture'] = array(
      '#type' => 'managed_file',
      '#upload_location' => 'public://pictures/',
      '#title' => $this->t('Picture'),
      '#theme' => 'my_profile_edit_user_picture',
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save Changes'),
      '#button_type' => 'primary',
    );
    $form['#theme'] = 'my_profile_edit';
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('phone_number')) < 10) {
      //$form_state->setErrorByName('phone_number', $this->t('Mobile number is too short.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $first_name = $form_state->getValue('frist_name');
    $last_name = $form_state->getValue('last_name');
    $phone_number = $form_state->getValue('phone_number');
    $address = $form_state->getValue('address');
    $state = $form_state->getValue('state');
    $city = $form_state->getValue('city');
    $zip_code = $form_state->getValue('zipcode');
    $country = $form_state->getValue('country');
    $email = $form_state->getValue('e_mail');
    $picture_fid = $form_state->getValue('picture');
    if (!empty($picture_fid)) {
      $file = File::load($picture_fid[0]);
      $file->setPermanent();
      $file->save();
      $user->set('user_picture', $picture_fid);
    }
    else {
      $user->set('user_picture', NULL);
    }
    $user->set('field_first_name', $first_name);
    $user->set('field_last_name', $last_name);
    $user->set('field_phone_number', $phone_number);
    $user->set('field_address', $address);
    $user->set('field_state', $state);
    $user->set('field_city', $city);
    $user->set('field_zip_code', $zip_code);
    $user->set('field_country', $country);
    $user->setEmail($email);
    $user->save();
    drupal_set_message('Successfull updated');
  }

}
