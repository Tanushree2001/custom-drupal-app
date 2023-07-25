<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CustomPageController extends ControllerBase {

  /**
   * It contains the current login user
   * 
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * Initialize current user variable.
   * 
   * @param \Drupal\Core\Session\AccountInterface $current_user
   */
  public function __construct(AccountInterface $current_user){
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container)
  {
    return new static($container->get('current_user'));
  }

  /**
   * To show the welcome message to the user
   * 
   * @return array
   */
  public function content() {
    // $user = \Drupal::currentUser();
    // $username = $user->getAccountName();

    $user = $this->currentUser;
    $username = $user->getAccountName();
    return [
      '#markup' => $this->t('Hello @name' , ['@name' => $username]),
    ];
  }
}
