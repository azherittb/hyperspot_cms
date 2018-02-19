<?php
namespace Drupal\hyperspot_core\Plugin\rest\resource;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Psr\Log\LoggerInterface;
use \Drupal\node\Entity\Node;
/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "push_offer",
 *   label = @Translation("Push Offer"),
 *   uri_paths = {
 *     "canonical" = "/push_offer/{userid}/{devid}/{bregion}/{topic}/{event}"
 *   }
 * )
 */
class PushOffer extends ResourceBase {
  
  public function get($userid = NULL,$devid = NULL, $bregion = NULL, $topic = NULL, $event = "enter") {
    $bundle='push_registration';
    $fcm_api_access_key = 'AAAABWtamP0:APA91bHqPDRKzoSFCThyboNMHuZmb3BhWeG7wXak5_--ez3pb-WDj9WpMBK2B6phWgYzxd2eQsf_QovqVapomjG6WIkhgUA1zLPhXG_otup6LGqeqL02563cnIyJNbYCmZuxO7Q63Gj4';
	$fcm_send_url = 'https://fcm.googleapis.com/fcm/send';
    if($topic == 'general'){
        $registrationIds = array( 'all' );
        $query_offer = \Drupal::entityQuery('node');
        $query_offer->condition('status', 1);
        $query_offer->condition('type', 'my_offer');
        $query_offer->condition('field_restaurants.target_id', $bregion);
        $query_offer->condition('field_type_msg', 'general');
        if(count($entity_ids_offer)>0){
            foreach($entity_ids_offer as $nid_offer){
                $node_offer = Node::load($nid_offer);
                $offerid = $nid_offer;
                $title = $node_offer->title;
                $message = $node_offer->body->value;
                $subtitle = $node_offer->field_sub_title->value;
            }
        }
        $msg = array
		(
			'message'=> $message,
			'title'=> $title,
			'subtitle'=> $subtitle,
			'tickerText'=> 'Ticker..',
			'vibrate'=>1,
			'sound'=>1,
			'largeIcon'=>'large_icon',
			'smallIcon'=>'small_icon'
		);
        $fields = array
		(
			'registration_ids'=>$registrationIds,
			'data'=>$msg
		);
		$headers = array
		(
			'Authorization: key=' . $fcm_api_access_key,
			'Content-Type: application/json'
		);
        $ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, $fcm_send_url );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
    }else{
        $query_new = \Drupal::entityQuery('node');
        $query_new->condition('status', 1);
        $query_new->condition('type', $bundle);
        $query_new->condition('field_dev_id', $devid);
        $entity_ids_new = $query_new->execute();
        if(count($entity_ids_new)>0){
        foreach($entity_ids_new as $nid_new){
            $node_new = Node::load($nid_new);
            $registrationIds = $node_new->field_token->value;
        }
        $query_offer = \Drupal::entityQuery('node');
        $query_offer->condition('status', 1);
        $query_offer->condition('type', 'my_offer');
        $query_offer->condition('field_restaurants.target_id', $bregion);
        $query_offer->condition('field_type_msg', 'offer');  
        $query_offer->condition('field_event_text', $event);     
        $entity_ids_offer = $query_offer->execute();
        if(count($entity_ids_offer)>0){
            foreach($entity_ids_offer as $nid_offer){
                $node_offer = Node::load($nid_offer);
                $offerid = $nid_offer;
                $title = $node_offer->title;
                $message = $node_offer->body->value;
                $subtitle = $node_offer->field_sub_title->value;
                $event = $node_offer->field_event_text->value;
            }
            $msg = array
			(
				'message'=> $message,
				'title'=> $title,
				'subtitle'=> $subtitle,
				'tickerText'=> 'Ticker..',
				'vibrate'=>1,
				'sound'=>1,
				'largeIcon'=>'large_icon',
				'smallIcon'=>'small_icon'
			);
            $fields = array
			(
				'registration_ids'=>$registrationIds,
				'data'=>$msg
			);

			$headers = array
			(
				'Authorization: key=' . $fcm_api_access_key,
				'Content-Type: application/json'
			);
            $ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, $fcm_send_url );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );
            $node = Node::create([
               'type' => 'push_log',    
               'title' => 'Push log',        
               'field_offer'=>$offerid,    
               'field_status'=>'sent',    
               'field_user_id'=>$userid, 
               'field_dev_id'=>$devid,   
            ]);    
            $node->save();
            $msg = "Successfully sent";
        }else{
            $msg = "No notifications are available";
        }
        }else{
            $msg = "User is not registered for Push notification";
        }
        
    }
    $response = ['message' => $msg];
    return new ResourceResponse($response);
  }
}