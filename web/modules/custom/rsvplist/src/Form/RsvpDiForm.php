<?php

// namespace Drupal\rsvplist\Form\RsvpDiForm;

// use Symfony\Component\DependencyInjection\ContainerInterface;
// use Drupal\Core\Form\FormBase;
// use Drupal\Core\Form\FormStateInterface;
// use Egulias\EmailValidator\EmailValidator;
// use Drupal\Core\Session\AccountInterface;
// use Drupal\Core\Messenger\MessengerInterface;
// // use Drupal\Core\Routing\RouteMatchInterface;

// class RsvpDiForm extends FormBase {

//   /**
//    * It contains the the RouteMatch variable
//    * 
//    * @var Drupal\Core\Session\AccountInterface
//    * @var Drupal\Core\Messenger\MessengerInterface
//    * @var Egulias\EmailValidator\EmailValidator
//    */
//   protected $emailValidator;
//   protected $account;
//   protected $messenger;

//   /** 
//    * Initailize the AccountInterface, MessageInterface and EmailValidator
//    * 
//    * @param Drupal\Core\Session\AccountInterface $account_interface
//    * @param Drupal\Core\Messenger\MessengerInterface $add_messenger
//    * @param Egulias\EmailValidator\EmailValidator $email_validator
//    */
//   public function __construct(AccountInterface $account_interface, MessengerInterface $add_messenger, EmailValidator $email_validator)
//   {
//     $this->emailValidator = $email_validator;
//     $this->account = $account_interface;
//     $this->messenger = $add_messenger;
//   }
  
//   public static function create(ContainerInterface $container)
//   {
//     return new static(
//       $container->get('email_validator'),
//       $container->get('account_interface'),
//       $container->get('add_messenger'),
//     );
//   }

//   /**
//    * {@inheritdoc}
//    */
//   public function getFormId()
//   {
//     return 'di_email';
//   }

//   /**
//    * {@inheritdoc}
//    */
//   public function buildForm(array $form, FormStateInterface $form_state, $options=NULL)
//   { 
//     $form['email'] = [
//       '#type' => 'textfield',
//       '#title' => $this->t('Email'),
//       '#required' => TRUE,
//     ];
//     $form['submit'] = [
//       '#type' => 'submit',
//       '#value' => $this->t('Send'),
//     ];  
//   }
  
//   /**
//    * Email Validation
//    */
//   protected function validateEmail(array &$form, FormStateInterface $form_state){

//   }

//   /**
//    * {@inheritdoc}
//    */
//   public function validateForm(array &$form, FormStateInterface $form_state)
//   {
//     $email = $form_state->getValue('email');
//     if(!empty($email)) {
//       if(!$this->validateEmail($form, $form_state)){
        
//       }
//     }
//   }


// }