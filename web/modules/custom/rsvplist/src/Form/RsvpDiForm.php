<?php

namespace Drupal\rsvplist\Form\RsvpDiForm;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\RouteMatchInterface;

class RsvpDiForm extends FormBase {

  /**
   * It contains the the RouteMatch variable
   * 
   * @var Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * Initailize the RouteInterface variable
   * 
   * @param Drupal\Core\Routing\RouteMatchInterface $route_match
   */
  public function __construct(RouteMatchInterface $route_match)
  {
    $this->routeMatch = $route_match;
  }


}