<?php

/*
  /**
 * @file
 * Contains \Drupal\hyperspot_core\Form\MyProfileForm.
 */

namespace Drupal\hyperspot_core\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\taxonomy\Entity\Term;

/**
 * Contribute form.
 */
class MyEventBookingForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'my_event_booking_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $nid = NULL) {
    $node = \Drupal\node\Entity\Node::load($nid);
    $event_name = $node->getTitle();
    $event_date = $node->get('field_date')->getString();
    $event_time = $node->get('field_time')->getString();
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $username = $user->getUsername();
    $uid = $user->id();
    $person = array(
      '1 People' => '1 People',
      '2 People' => '2 People',
      '3 People' => '3 People',
      '4 People' => '4 People',
      '5 People' => '5 People',
    );
    $form['uid'] = array(
      '#type' => 'hidden',
      '#value' => $uid,
    );
    $form['username'] = array(
      '#type' => 'hidden',
      '#value' => $username,
    );
    $form['nid'] = array(
      '#type' => 'hidden',
      '#value' => $nid,
    );
    $form['event_name'] = array(
      '#type' => 'hidden',
      '#value' => $event_name,
    );
    $form['event_date'] = array(
      '#type' => 'hidden',
      '#value' => $event_date,
    );
    $form['event_arrival'] = array(
      '#type' => 'hidden',
      '#value' => $event_time,
    );
    $form['person'] = array(
      '#type' => 'select',
      '#title' => $this->t('Persons'),
      '#options' => $person,
      '#required' => TRUE,
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Confirm Booking'),
      '#button_type' => 'primary',
    );
    $form['#theme'] = 'my_event_form';
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $uid = $form_state->getValue('uid');
    $username = $form_state->getValue('username');

    $bookingTitle = 'Event Booking by ' . $username;
    $date = $form_state->getValue('event_date');
    $arrival = $form_state->getValue('event_arrival');
    $person = $form_state->getValue('person');
    $nid = $form_state->getValue('nid');

    $my_eventBooking = Node::create(['type' => 'event_booking']);
    $my_eventBooking->set('title', $bookingTitle);
    $my_eventBooking->set('field_date', $date);
    $my_eventBooking->set('field_time', $arrival);
    $my_eventBooking->set('field_persons', $person);
    $my_eventBooking->set('field_event', $nid);
    $my_eventBooking->set('field_customer', $uid);
    $my_eventBooking->enforceIsNew();
    $my_eventBooking->save();

    $form_state->setRedirect('hyperspot_core.my_event_booking_confirm', array('node' => $my_eventBooking->id()));
  }

}
