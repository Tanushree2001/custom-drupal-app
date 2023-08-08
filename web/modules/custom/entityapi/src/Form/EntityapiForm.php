<?php
/**
 * @file
 * Contains Drupal\entity_practice\Form\MovieForm.
 */

namespace Drupal\entityapi\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Form controller for the Movie entity edit form.
 * 
 * @ingroup entityapi
 */

class EntityapiForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form = parent::buildForm($form, $form_state);
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state){
    parent::save($form, $form_state);

    $url = Url::fromRoute('entity_practice.list');
    $form_state->setRedirectUrl($url);
  }
 
} 
