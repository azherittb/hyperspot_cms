<?php
namespace Drupal\hyperspot_core\Plugin\rest\resource;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Psr\Log\LoggerInterface;
use \Drupal\node\Entity\Node;
/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "push_registration",
 *   label = @Translation("Push Registration"),
 *   uri_paths = {
 *     "canonical" = "/push_registration/{userid}/{devid}/{token}"
 *   }
 * )
 */
class PushRegistration extends ResourceBase {
  
  public function get($userid = NULL,$devid = NULL, $token = NULL) {
    
    $bundle='push_registration';
    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->condition('type', $bundle);
    $query->condition('field_dev_id', $devid);
    $query->accessCheck(false);   
    $entity_ids = $query->execute();
    if(count($entity_ids)>0){
        foreach($entity_ids as $nid){
            $node = Node::load($nid);
            $node->field_user_id = $userid;
            $node->field_token = $token;
            $node->save();
            $msg = "Successfully updated registration";
        }
    }else{
        $node = Node::create([
           'type' => $bundle,    
           'title' => 'Push registration',        
           'field_user_id'=>$userid,    
           'field_dev_id'=>$devid,    
           'field_token'=>$token,    
        ]);    
        $node->save();
        $msg = "Successfully registered";
    }
    $response = ['message' => $msg];
    //print json_encode($response);
    return new ResourceResponse($response);
  }
}