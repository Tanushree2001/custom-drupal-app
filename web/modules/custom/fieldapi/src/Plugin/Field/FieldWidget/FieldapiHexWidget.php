<?php

namespace Drupal\fieldapi\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextareaWidget;
use Drupal\Core\Field\WidgetBase;

/**
 * Implementation of "Fieldapi_hex_widget"
 * 
 * @FieldWidget(
 *   id = "custom_color_hex_widget",
 *   label = @Translation("Custom Colour Hex Widget"),
 *   desc = @Translation("Custom Colour Hex Widget"),
 *   field_types = {
 *     "custom_colour_field"
 *   }
 * )
 */
class FieldapiHexWidget extends WidgetBase{

  /**
   * {@inheritdoc}
   */
  // public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
  // {
  //   $element += parent::formElement($items, $delta, $element, $form, $form_state);
  //   $element['value']['#type'] = 'color';
  //   $element['value']['#maxlength'] = 7;
  //   return $element;
  // }

  // public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
  // {
  //   $element = parent::formElement($items, $delta, $element, $form, $form_state);
  //   $flag = isset($element['value']['#default_value']) ? $element['value']['default_value'] : '';

  //   $element['value'] = [
  //     '#type' => 'color',
  //     '#maxlength' => 7,
  //     '#default_value' => $flag,
  //   ]; 

  //   return $element;
  // }

  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
  {
    // $current_user_roles = \Drupal::currentUser()->getRoles();
    // if (in_array('administrator', $current_user_roles)) {
      $value = isset($items[$delta]->color) ? $items[$delta]->color : '';
      $element = $element + [
        '#type' => 'textfield',
        '#title' => $this->t('Hex'),
        '#description' => $this->t('Hex value will be in some format'),
        '#default_value' => $value,
        '#size' => 7,
        '#maxlength' => 7,
        '#element_validate' => [
          [$this, 'validate'],
        ],
      ];
    // }
    return ['color' => $element];
  }
  
  /** 
   * Validate the color text field
   */
  public function validate($element, FormStateInterface $form_state) {
    $value = $element['#value'];
    if (strlen($value) == 0) {
      $form_state->setValueForElement($element, '');
      return;
    }
    if (!preg_match('/^#([a-f0-9]{6})$/iD', strtolower($value))) {
      $form_state->setErrorByName($element,$this->t('color must be 6-digit hexadecimal number'));
    }
  }  
}
