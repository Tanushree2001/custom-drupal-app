<?php

namespace Drupal\mymodule\Routing;

use Symfony\Component\Routing\RouteCollection;
use Drupal\Core\Routing\RouteSubscriberBase;

/**
 * Alters existing routes.
 */
class CustomRouteSubscriber extends RouteSubscriberBase{
  /**
   * {@inheritdoc}  
   */ 
  protected function alterRoutes(RouteCollection $collection) {
    // check if the route you want to alter exists in the $collection.
    if ($route = $collection->get('mymodule.admin_editor_route')) {
      $route->setRequirement('_role', 'administrator');
    }
  }
}