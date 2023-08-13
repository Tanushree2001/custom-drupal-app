<?php

namespace Drupal\rsvplist\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a rsvp block
 * 
 * @Block(
 *  id = "rsvp_block",
 *  admin_label = @Translation("Rsvp block"),
 * )
 */

class RsvpBlock extends BlockBase{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $user = \Drupal::currentUser();   
    $username =  $user->getAccountName();

    return[
      '#markup' => $this->t('Welcome @name' , ['@name' => $username]),
    ];
  }
}