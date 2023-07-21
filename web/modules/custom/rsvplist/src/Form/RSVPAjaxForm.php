<?php

/**
 * @file
 *  A form to collect an email address for RSVP details.
 */

 namespace Drupal\rsvplist\Form;

use Drupal\Component\Utility\Html;
use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;
 use Drupal\Core\Ajax\AjaxResponse;
 use Drupal\Core\Ajax\HtmlCommand;

 class RSVPAjaxForm extends FormBase {
  // Attempt to get the fully loaded node object of the viewed page.
  
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rsvplist_ajax_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $node = \Drupal::routeMatch()->getParameter('node');

    // Some pages may not be nodes though and $node will be NULL on those pages.
    // If a node was loaded, get the node id.
    if ( !(is_null($node)) ) {
      $nid = $node->id();
    }  
    else {
      // If a node could not be loaded, default to 0;
      $nid = 0;
    }

    $form['#attached']['library'][] = 'core/drupal.ajax';

    // $form['element'] = [
    //   '#type' = 'markup',
    //   '#markup' = "<div class= 'success'></div>",
    // ];

    // Establish the $form render array. It has an email text field,
    // a submit button, and a hidden field containing the node ID.
    
    $form['full_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Full Name'),
      '#required' => TRUE,
    ];

    $form['phone_number'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone Number'),
      '#required' => TRUE,
      '#attributes' => [
        'pattern' => '[0-9]{10}',
      ],
    ];

    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email address'),
      '#size' => 25,
      '#description' => $this->t("We will send updates to the email address you provided"),
      '#required' => TRUE,
    ];

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options' => [
        'male' => $this->t('Male'),
        'female' => $this->t('Female'),
      ],
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('RSVP'),
    ];

    $form['nid'] = [
      '#type' => 'hidden',
      '#value' => $nid,
    ];

    return $form; 
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $phone_number = $form_state->getValue('phone_number');
    if (!preg_match('/^[0-9]{10}$/', $phone_number)) {
      $form_state->setErrorByName('phone_number', $this->t('Invalid phone number'));
    }
    
    // $value = $form_state->getValue('email');
    // if ( !(\Drupal::service('email.validator')->isValid($value)) ) {
    //   $form_state->setErrorByName('email', $this->t('It appears that %mail is not valid. Please try again', ['%mail' => $value]));
    // }
  }

  // public function validateEmail(array &$form, FormStateInterface $form_state) {

  //   $email = $form_state->getValue('email');
  //   $allowed_domains = ['gmail.com','yahoo.com','outlook.com'];
  //   $domain = substr(strrchr($email, "@"), 1);

  //   $response = new AjaxResponse();

  //   if(empty($email)) {
  //     $response->addCommand(new HtmlCommand('#edit-email-error', $this->t('Email field is required')));
  //   }
  //   elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  //     $response->addCommand(new HtmlCommand('#edit-email-error', $this->t('Email is not valid')));
  //   }
  //   elseif (!in_array($domain, $allowed_domains)){
  //     $response->addCommand(new HtmlCommand('#edit-email-error', $this->t('its not valid format! write email in the format of gmail.com, yahoo.com, outlook.com')));
  //   }
  //   else{
  //     $response->addCommand(new HTMLCommand('#edit-email-error', ''));
  //   }
  //   return $response;
  // }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $submitted_email = $form_state->getValue('email');
    // $this->messenger()->addMessage("The form is working! You entered @entry.", ['@entry' => $submitted_email]);
    $this->messenger()->addMessage("The form is working!");
  }
 }