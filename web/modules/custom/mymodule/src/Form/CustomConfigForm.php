<?php

// use Drupal\Core\Form\FormBase;
// use Drupal\Core\Form\FormStateInterface;

// /**
//  * Implements the custom configuration form.
//  */
// class CustomConfigForm extends FormBase
// {

//   /**
//    * {@inheritdoc}
//    */
//   public function getFormId()
//   {
//     return 'mymodule_config_form';
//   }

//   /**
//    * {@inheritdoc}
//    */
//   public function buildForm(array $form, FormStateInterface $form_state)
//   {
//     // $form['full_name'] = [
//     //   '#type' => 'textfield',
//     //   '#title' => $this->t('Full Name'),
//     //   '#required' => TRUE,
//     // ];

//     // $form['phone_number'] = [
//     //   '#type' => 'tel',
//     //   '#title' => $this->t('Phone Number'),
//     //   '#required' => TRUE,
//     //   '#attributes' => [
//     //     'pattern' => '[0-9]{10}',
//     //   ],
//     // ];

//     $form['email'] = [
//       '#type' => 'email',
//       '#title' => $this->t('Email ID'),
//       '#required' => TRUE,
//     ];

//     // $form['gender'] = [
//     //   '#type' => 'radios',
//     //   '#title' => $this->t('Gender'),
//     //   '#options' => [
//     //     'male' => $this->t('Male'),
//     //     'female' => $this->t('Female'),
//     //     'other' => $this->t('Other'),
//     //   ],
//     //   '#default_value' => 'male', // Set the default value here if needed.
//     //   '#required' => TRUE,
//     // ];

//     $form['submit'] = [
//       '#type' => 'submit',
//       '#value' => $this->t('Submit'),
//     ];

//     return $form;
//   }

//   /**
//    * {@inheritdoc}
//    */
//   // public function validateForm(array &$form, FormStateInterface $form_state)
//   // {
//   //   $phone_number = $form_state->getValue('phone_number');
//   //   if (!preg_match('/^[0-9]{10}$/', $phone_number)) {
//   //     $form_state->setErrorByName('phone_number', $this->t('Invalid phone number. Please enter a 10-digit Indian number.'));
//   //   }

//     // $email = $form_state->getValue('email');
//     // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     //   $form_state->setErrorByName('email', $this->t('Invalid email format.'));
//     // }public function validateForm(array &$form, FormStateInterface $form_state)
//   // {
//   //   $phone_number = $form_state->getValue('phone_number');
//   //   if (!preg_match('/^[0-9]{10}$/', $phone_number)) {
//   //     $form_state->setErrorByName('phone_number', $this->t('Invalid phone number. Please enter a 10-digit Indian number.'));
//   //   }
//     // else {
//     //   $allowed_domains = ['gmail.com', 'yahoo.com', 'outlook.com', 'example.com'];
//     //   $domain = substr(strrchr($email, "@"), 1);
//     //   if (!in_array($domain, $allowed_domains)) {
//     //     $form_state->setErrorByName('email', $this->t('Invalid email domain. Only .com domains are allowed.'));
//     //   }
//     // }
//   // }

//   /**
//    * {@inheritdoc}
//    */
//   public function submitForm(array &$form, FormStateInterface $form_state)
//   {
//     // Process the submitted form data here.
//     // For example, save the values to configuration or database.
//   }
// }

namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CustomConfigForm extends FormBase {
  public function getFormId(){
     return 'CustomConfigForm';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    // $form['email'] = [
    //   '#title' => $this->t('Email Address'),
    //   '#type' => 'textfield',
    //   '#size' => 25,
    //   '#required' => TRUE,
    //   '#description' => $this->t('myfirst form'),
    // ];

    // $form['submit'] = array(
    //   '#type' => 'submit',
    //   '#value' => $this->t('submit'),
    // );
    
    // return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // drupal_set_message('Form testing completed');

  }
}