<?php

namespace Drupal\unt_alerts\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'UntAlertsBlock' block.
 *
 * @Block(
 *  id = "unt_alerts_block",
 *  admin_label = @Translation("UNT Alerts block"),
 *
 * )
 */
class UntAlertsBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * @var \Drupal\unt_alerts\UntAlertsClient
   */
  protected $untAlertsClient;

  /**
   * UntEvents constructor
   * @param array $configuration
   * @param $plugin_id
   * @param $plugin_definition
   * @param $unt_alerts_client \Drupal\unt_alerts\UntAlertsClient
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, \Drupal\unt_alerts\UntAlertsClient $unt_alerts_client) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->untAlertsClient = $unt_alerts_client;
  }

  /**
   * {@inheritdoc }
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('unt_alerts_client')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

      $alert = $this->untAlertsClient->getAlert();

      if(!empty($alert)){
        $build = [
          '#theme' => 'unt_alerts_block',
          '#headline' => $alert[0]['alertTitle'],
          '#content' => ['#markup' => $alert[0]['alertBody']],
        ];

        return $build;
      }
  }
}
