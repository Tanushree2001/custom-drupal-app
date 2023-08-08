<?php

namespace Drupal\fieldapi\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Form\FormStateInterface;

/**
 * Define the Custom Field API
 * 
 * @FieldType(
 *   id = "custom_colour_field",
 *   label = @Translation("Custom Colour Field"),
 *   description = @Translation("Desc for custom colour field"),
 *   category = @Translation("Text"),
 *   default_widget = "custom_color_hex_widget",
 * )
 */

class FieldapiCustomField extends FieldItemBase{

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_dfinition){
    return [
      'columns' => [
        'color' => [
          'type' => 'varchar',
          'length' => 7,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings()
  {
    return [
      'length' => 10, 
    ] + parent::defaultStorageSettings(); 
  }

  /**
   * {@inheritdoc}
   */
  public function storageSettingsForm(array &$form, FormStateInterface $form_state, $has_data)
  {
    $element = [];

    $element['length'] = [
      '#type' => 'number',
      '#title' => $this->t('Length of your colour code'),
      '#required' => TRUE,
      'default_value' => $this->getSetting('length'),
    ];

    return $element;
  } 

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings()
  {
    return [
      'colour_code' => '#',
    ] + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state)
  {
    $element = [];

    $element['colour_code'] = [
      '#type' => 'textfield',
      '#title' => 'Write your colour code',
      '#required' => TRUE,
      '#default_value' => $this->getSetting("colour_code"),
    ];

    return $element;
  } 
  

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
  {
    $properties['color'] = DataDefinition::create('string')->setLabel('RGB Color');
    return $properties;
  }
}