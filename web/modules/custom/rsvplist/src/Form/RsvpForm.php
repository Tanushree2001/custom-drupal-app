<?php

namespace Drupal\rsvplist\Form\RsvpAjaxForm;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\InvokeCommand;
use Drupal\Core\Ajax\MessageCommand;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Create a config ajax form for collecting user data
 */
class RsvpForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(){
      return 'rsvplist_ajax_form';
  }
  
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'rsvplist.settings',
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form = [];
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      'required' => TRUE,
    ];

    $form['actions']['#type'] = 'actions';

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
      '#ajax' => [
        'callback' => '::ajaxFormSubmitHandler'
      ]
    ];

    return $form;
  }
  
  /**
   * Using ajax showing the errors
   * 
   * @param array $form
   * Takes the form render array.
   * 
   * @param FormStateInterface $form_state
   * Takes the FormState object. 
   * 
   * @return object
   * Returns ajax response.
   */
  public function ajaxFormSubmitHandler(array &$form, FormStateInterface $form_state){
    $response = new AjaxResponse();
    $formField = $form_state->getValue('first_name');
    // $values = $this->validate($formField);
    
    // if($values['flag']){
    //   $response
    // }
    // $formField = $form_state->getValue('values'); // Replace 'values' with the correct form element name.
    // $values = $this->validate($formField);

    // if ($values['flag']) {
    //     $response->addCommand(new MessageCommand('Form submit successfully', NULL));
    //     $response->addCommand(new InvokeCommand('#edit-full-name', 'val', ['']));
    //     $response->addCommand(new InvokeCommand('#edit-phone-number', 'val', ['']));
    //     $response->addCommand(new InvokeCommand('#edit-email-id', 'val', ['']));
    // } else {
    //     $response->addCommand(new MessageCommand($values['error_message'], NULL, ['type' => 'error']));
    // }

    // return $response;

  }

} 