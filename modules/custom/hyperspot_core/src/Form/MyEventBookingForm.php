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
    dsm($event_date . $event_time);
    $arrival = array(
      '12:00 AM' => '12:00 AM',
      '01:00 AM' => '01:00 AM',
      '02:00 AM' => '02:00 AM',
      '03:00 AM' => '03:00 AM',
      '04:00 AM' => '04:00 AM',
      '05:00 AM' => '05:00 AM',
      '06:00 AM' => '06:00 AM',
      '07:00 AM' => '07:00 AM',
      '08:00 AM' => '08:00 AM',
      '09:00 AM' => '09:00 AM',
      '10:00 AM' => '10:00 AM',
      '11:00 AM' => '11:00 AM',
      '12:00 PM' => '12:00 PM',
      '01:00 PM' => '01:00 AM',
      '02:00 PM' => '02:00 PM',
      '03:00 PM' => '03:00 PM',
      '04:00 PM' => '04:00 PM',
      '05:00 PM' => '05:00 PM',
      '06:00 PM' => '06:00 PM',
      '07:00 PM' => '07:00 PM',
      '08:00 PM' => '08:00 PM',
      '09:00 PM' => '09:00 PM',
      '10:00 PM' => '10:00 PM',
      '11:00 PM' => '11:00 PM',);
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
    $form['date'] = array(
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#attributes' => array('type' => 'date', 'min' => 'now', 'max' => '+5 years'),
      '#date_date_format' => 'd/m/Y',
      '#required' => TRUE,
    );
    $form['arrival'] = array(
      '#type' => 'select',
      '#title' => $this->t('Arrival'),
      '#options' => $arrival,
      '#required' => TRUE,
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
//    $form['#theme'] = 'my_reservation_form';
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
    $date = $form_state->getValue('date');
    $arrival = $form_state->getValue('arrival');
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
