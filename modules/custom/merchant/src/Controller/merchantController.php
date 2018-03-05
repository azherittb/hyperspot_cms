<?php

/**
 * @file
 * Contains \Drupal\merchant\Controller\merchantController.
 */

namespace Drupal\merchant\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\Core\Database\Database;
use Drupal\node\Entity\Node;


/**
 * Provides route responses for the Example module.
 */
class merchantController extends ControllerBase {

  public function merchant_page() {
		$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
		$name = $user->getUsername();
		$roles = $user->getRoles();
		$first_name = $user->get('field_first_name')->value;
		$connection = Database::getConnection();
		$result = $connection->query("select * FROM {acl} al left join {acl_node} aln on al.acl_id=aln.acl_id left join {node} n on n.nid=aln.nid left join {node_field_data} nfd on n.nid=nfd.nid left join {acl_user} alu on alu.acl_id=al.acl_id where aln.grant_update=1 and alu.uid = :user_id", [
			'user_id' => $user->id(),]);
	
$yescount = count($result);
$profile = array();

     foreach ($result as $account) {
		 if($account->type=='restaurant'){
      $accounts[$account->nid] = $account->title;
	  $node= Node::load($account->nid);
	  $imageUrl = file_create_url($node->get('field_image')->entity->uri->value);
	  $restaurant = \Drupal::entityTypeManager()->getStorage('node')->load($account->nid);
	  $restaursant_id=($restaurant->get(field_restaurant)->target_id);
	  //print_r($restaurant->get(field_dress_code_timing)->value);
	  //echo $restaurant['field_restaurant']['x-default'][0]['target_id'];
			  $profile[] = array(
			  //'#markup' =>  '<div class=done><a href="' . $account->nid. '/'.$restaursant_id'">'.$account->title.'</a></div>',
			  '#markup' =>  '<div class="done col-md-12"><a href="/node/'.$account->nid.'">'.$account->title.'</a></div>
			  <div class="col-md-12">
			  <div class="col-md-4">
			     <img width="250px" src="'.$imageUrl.'" alt="">
			  </div>
			  <div class="col-md-4 statcol">
			  <div class="gallery"><a '.$account->nid.'/edit">Hotel Details</a></div>
			  <div class="gallery"><a '.$restaursant_id.'">Gallery Details</a></div>
			  <div class="spl_dish"><a '.$restaursant_id.'">Special Dish Details</a></div>
			  <div class="banner"><a '.$restaursant_id.'">Banner Details</a></div> </div>
			    <div class="col-md-4 dyncol">
			   <div class="gallery"><a href="/node/'.$account->nid.'/edit">View/Edit Hotel Details</a></div>
			  <div class="gallery"><a href="/gallery_page/'.$restaursant_id.'">View/Edit Gallery Details</a></div>
			  <div class="spl_dish"><a href="/spl_dish/'.$restaursant_id.'">View/Edit Special Dish Details</a></div>
			  <div class="banner"><a href="/banner_images/'.$restaursant_id.'">View/Edit Banner Details</a></div> </div></div>',
			);
		 }
    } 
	
    return $profile;
  }
  public function merchant_view_page() {
		
			  $profile = array(
			  //'#markup' =>  '<div class=done><a href="' . $account->nid. '/'.$restaursant_id'">'.$account->title.'</a></div>',
			  '#markup' =>  '<div class=done>Here Your Restaursant details</div>',
			);

    return $profile;
	     $block = \Drupal::entityTypeManager()->getStorage('block')->load('galleryimage');
$block['galleryimage'] =  \Drupal::entityTypeManager()->getViewBuilder('block')->view($block);
 
  }
    public function merchantviewpage() {
		
						$request = \Drupal::request();
						$current_path = $request->getPathInfo();
						$path_args = explode('/', $current_path);
						$nid = $path_args[4];
						$node = \Drupal\node\Entity\Node::load($nid);
						$event_name = $node->getTitle();
						$event_date = $node->get('field_date')->getString();
						$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
						$username = $user->getUsername();
						$uid=$user->id();
						$date = $event_date = $node->get('field_date')->getString();;
						$person = '1';
						$bookingTitle = 'Event Booking by ' . $username;
						$date = $event_date = $node->get('field_date')->getString();;
						$arrival = $event_time = $node->get('field_time')->getString();
						$my_eventBooking = Node::create(['type' => 'event_booking']);
						$my_eventBooking->set('title', $bookingTitle);
						$my_eventBooking->set('field_date', $date);
						$my_eventBooking->set('field_time', $arrival);
						$my_eventBooking->set('field_persons', $person);
						$my_eventBooking->set('field_event', $nid);
						$my_eventBooking->set('field_customer', $uid);
						$my_eventBooking->enforceIsNew();
						$my_eventBooking->save();
						echo $my_eventBooking->id();
exit;
  }
   public function eventmaybe() {
						$request = \Drupal::request();
						$current_path = $request->getPathInfo();
						$path_args = explode('/', $current_path);
						$nid = $path_args[4];
						$node = \Drupal\node\Entity\Node::load($nid);
						$event_name = $node->getTitle();
						$event_date = $node->get('field_date')->getString();
						$user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
						$username = $user->getUsername();
						$uid=$user->id();
						$date = $event_date = $node->get('field_date')->getString();;
						$person = '1';
						$bookingTitle = 'Event Booking by ' . $username;
						$date = $event_date = $node->get('field_date')->getString();;
						$arrival = $event_time = $node->get('field_time')->getString();
						$my_eventBooking = Node::create(['type' => 'event_may_be']);
						$my_eventBooking->set('title', $bookingTitle);
						$my_eventBooking->set('field_date', $date);
						$my_eventBooking->set('field_time', $arrival);
						$my_eventBooking->set('field_persons', $person);
						$my_eventBooking->set('field_event', $nid);
						$my_eventBooking->set('field_customer', $uid);
						$my_eventBooking->enforceIsNew();
						$my_eventBooking->save();
						echo $my_eventBooking->id();
						
exit;
  }

}
