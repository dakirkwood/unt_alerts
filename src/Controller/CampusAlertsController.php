<?php
//
//namespace Drupal\unt_alerts\Controller;
//
//use Drupal\Core\Controller\ControllerBase;
//use Drupal\unt_alerts\UntAlertsClient;
//use Drupal\user\Plugin\views\filter\Name;
//use Symfony\Component\DependencyInjection\ContainerInterface;
//use Symfony\Component\HttpFoundation\Response;
//
///**
// * Class CampusAlertsController.
// */
//class CampusAlertsController extends ControllerBase {
//
//  private $untAlertsClient;
//
//  public function __construct(UntAlertsClient $untAlertsClient){
//
//    $this->untAlertsClient = $untAlertsClient;
//  }
//
//  public static function create(ContainerInterface $container) {
//    $untAlertsClient = $container->get('unt_alerts_client');
//
//    return new static($untAlertsClient);
//  }
//
//  /**
//   * Show the entire alert.
//   *
//   * @return Response
//   *
//   */
//  public function showAlert($alertId) {
//    $api_response = $this->untAlertsClient->getAlert($alertId);
//    //var_dump($api_response[0]);
//    return [
//      '#theme' => 'unt_alerts_info',
//      '#name' => 'UNT Alert',
//      '#type' => 'markup',
//      '#title' => $api_response[0]['alertTitle'],
//      '#content' =>  ['#markup' => $api_response[0]['alertBody']],
//      '#department' => ['#markup' => $api_response[0]['alertDept']],
//    ];
//
//  }
//
//}
