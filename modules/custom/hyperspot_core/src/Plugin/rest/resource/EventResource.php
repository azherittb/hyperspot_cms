<?php

namespace Drupal\hyperspot_core\Plugin\rest\resource;

use Drupal\Core\Session\AccountProxyInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Psr\Log\LoggerInterface;

/**
 * Provides a Demo Resource
 *
 * @RestResource(
 *   id = "event_resource",
 *   label = @Translation("Event Resource"),
 *   uri_paths = {
 *     "canonical" = "/event_resource/{nid}"
 *   }
 * )
 */
class EventResource extends ResourceBase {

   /**
   * A current user instance.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;
  /**
   * Constructs a Drupal\rest\Plugin\ResourceBase object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param array $serializer_formats
   *   The available serialization formats.
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   A current user instance.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    array $serializer_formats,
    LoggerInterface $logger,
    AccountProxyInterface $current_user) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
    $this->currentUser = $current_user;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->getParameter('serializer.formats'),
      $container->get('logger.factory')->get('event_resource'),
      $container->get('current_user')
    );
  }
  /**
   * Responds to GET requests.
   *
   * Returns a list of bundles for specified entity.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\HttpException
   *   Throws exception expected.
   */
  public function get($nid = NULL) {

    // You must to implement the logic of your REST Resource here.
    // Use current user after pass authentication to validate access.
    if (!$this->currentUser->hasPermission('access content')) {
      throw new AccessDeniedHttpException();
    }

    //Get count of attentd event booking
      $query = db_select('node', 'n');
      $query->condition('n.type', 'event_booking');
      $query->fields('n', ['nid']);
      $query->leftJoin('node__field_event', 'evn', 'n.nid = evn.entity_id');
      $query->condition('evn.field_event_target_id', $nid);
      $result = $query->execute()->fetchAll();
      $yescount = count($result);

    //Get count of not attentd event booking
      $query1 = db_select('node', 'n');
      $query1->condition('n.type', 'event_may_be');
      $query1->fields('n', ['nid']);
      $query1->leftJoin('node__field_event', 'evnt', 'n.nid = evnt.entity_id');
      $query1->condition('evnt.field_event_target_id', $nid);
      $output = $query1->execute()->fetchAll();
      $nocount = count($output);
      $response = ['yes_count' => $yescount, 'no_count' => $nocount]; 

   // $response = t("Hello, USING REST API");
   // print_r($response); exit();
    return new ResourceResponse($response);
  }

}