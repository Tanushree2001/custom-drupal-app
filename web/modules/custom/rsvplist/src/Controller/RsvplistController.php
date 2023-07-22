<?php

namespace Drupal\rsvplist\Controller;

use Drupal\Core\Controller\ControllerBase;

class RsvplistController extends ControllerBase{
  
  public function Content() {
    $wel_msg = 'Hello welcome to the custom welcome page';
    return [
      '#markup' => $this->t($wel_msg),
    ];
  }
}