<?php

namespace Drupal\rsvplist\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a rsvp block
 * 
 * @Block(
 *  id = "rsvp_block",
 *  admin_label = @Translation("Rsvp block"),
 * )
 */

class RsvpBlock extends BlockBase implements ContainerFactoryPluginInterface {
  
  /**
   * The variable for current user.
   * 
   * @var Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;
  /**
   * Constructs a new rsvplist
   * 
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin Instance
   * @param mixed $plugin_definition
   *   The plugin implements definition.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   Initialize the AccountInterface variable
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, AccountInterface $current_user)
  {  
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
  {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    // $user = \Drupal::currentUser();   
    // $username =  $user->getAccountName();

    $user = $this->currentUser;
    $username = $user->getAccountName();

    return[
      '#markup' => $this->t('Welcome @name' , ['@name' => $username]),
    ];
  }
}