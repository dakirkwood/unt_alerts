<?php

namespace Drupal\unt_alerts;

use Drupal\Component\Serialization\Json;

class UntAlertsClient {
  /**
   * @var \GuzzleHttp\Client
   */

  protected $client;

  /**
   * UntAlertsClient constructor
   * @param $http_client_factory \Drupal\Core\Http\ClientFactory
   */

  public function __construct(\Drupal\Core\Http\ClientFactory $http_client_factory){
    $this->client = $http_client_factory->fromOptions([
      'base_uri' => 'http://alerts.d9.loc'
    ]);
  }

  /**
   * Show the alert in the alerts region
   *
   * @param int $deptId
   *
   * @return array
   */
  public function getAlert($deptId = 1){
    $response = $this->client->get('api/alerts', [
      'query' => [
        'department' => $deptId,
        '_format' => 'json',
      ],
    ]);
    return Json::decode($response->getBody());
  }

  /**
   * Show the complete alert notification.
   *
   * @param int $alertId
   *
   * @return array
   */
  public function getAlertInfo($alertId){
    $response = $this->client->get('api/alert', [
      'query' => [
        'id' => $alertId,
        '_format' => 'json',
      ],
    ]);

    return Json::decode($response->getBody());

  }
}

