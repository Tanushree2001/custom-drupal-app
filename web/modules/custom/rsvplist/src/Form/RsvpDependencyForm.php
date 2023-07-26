<?php

namespace Drupal\rsvplist\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Egulias\EmailValidator\EmailValidator;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Messenger\MessengerInterface;
// use Drupal\Core\Routing\RouteMatchInterface;

class RsvpDependencyForm extends FormBase {

  /**
   * It contains the the RouteMatch variable
   * 
   * @var Drupal\Core\Session\AccountInterface
   * @var Drupal\Core\Messenger\MessengerInterface
   * @var Egulias\EmailValidator\EmailValidator
   */
  protected $emailValidator;
  protected $account;
  protected $messenger;

  /** 
   * Initailize the AccountInterface, MessageInterface and EmailValidator
   * 
   * @param Drupal\Core\Session\AccountInterface $account_interface
   * @param Drupal\Core\Messenger\MessengerInterface $add_messenger
   * @param Egulias\EmailValidator\EmailValidator $email_validator
   */
  public function __construct(AccountInterface $account_interface, MessengerInterface $add_messenger, EmailValidator $email_validator)
  {
    $this->emailValidator = $email_validator;
    $this->account = $account_interface;
    $this->messenger = $add_messenger;
  }
  
  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('current_user'),
      $container->get('messenger'),
      $container->get('email.validator'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'di_email';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  { 
    $form = [];
    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
    ];  
    return $form;
  }
  
  /**
   * Email Validation
   */
  protected function validateEmail(array &$form, FormStateInterface $form_state){
    if (!$this->emailValidator->isValid($form_state->getValue('email'))){
      return FALSE;
    }
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    $email = $form_state->getValue('email');
    if(!empty($email)) {
      if(!$this->validateEmail($form, $form_state)){
        $form_state->setErrorByName('email',$this->t('Invalid email address'));
      }
    }
    else {
      $form_state->setErrorByName('email',$this->t("Please enter an email address"));
    }
    $form_state->setValue('email',$email);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->messenger->addMessage('It is done');
  }
}