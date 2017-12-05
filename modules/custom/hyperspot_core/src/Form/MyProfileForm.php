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

/**
 * Contribute form.
 */
class MyProfileForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'my_profile_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['frist_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name'),
    );
    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name'),
    );
    $form['phone_number'] = array(
      '#type' => 'tel',
      '#title' => t('Phone Number'),
    );
    $form['e_mail'] = array(
      '#type' => 'email',
      '#title' => t('E- Mail'),
    );
    $form['address'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Address'),
      '#rows' => 1,
      '#cols' => 10,
    );
    $form['state'] = array(
      '#type' => 'textfield',
      '#title' => t('State'),
    );
    $form['city'] = array(
      '#type' => 'textfield',
      '#title' => t('City'),
    );
    $form['zipcode'] = array(
      '#type' => 'textfield',
      '#title' => t('Zip Code'),
    );
    $form['country'] = array(
      '#type' => 'textfield',
      '#title' => t('Country'),
    );
    $form['picture'] = array(
      '#type' => 'file',
      '#title' => t('Picture'),
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
      $form_state->setErrorByName('phone_number', $this->t('Mobile number is too short.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  }

}
