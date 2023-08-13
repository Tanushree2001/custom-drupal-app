<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomPageController extends ControllerBase {

  public function content() {
    $user = \Drupal::currentUser();
    $username = $user->getAccountName();

    return [
      '#markup' => $this->t('Hello @name' , ['@name' => $username]),
    ];
  }
}
