<?php

namespace Drupal\fieldapi\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\NumberWidget;

/**
 * Implementation of "Fieldapi RGB Widget"
 * 
 * @FieldWidget(
 *   id = "fieldapi_rgb_widget",
 *   label = @Translation("Custom Colour RGB Widget"),
 *   field_types = {
 *     "custom_colour_field"
 *   }
 * )
 */

class FieldapiRgbWidget extends NumberWidget{

  // /**
  //  * {@inheritdoc}
  //  */
  // public static function defaultSettings()
  // {
  //   return [
  //     'size' => 'small',
  //   ] + parent::defaultSettings();
  // }

  // /**
  //  * {@inheritdoc}
  //  */
  // public function settingsForm(array $form, FormStateInterface $form_state)
  // {
  //   $element = [];
  //   $element['size'] = [
  //     '#type' => 'textfield',
  //     '#title' => $this->t('Size'),
  //     '#default_value' => $this->getSetting("size"),
  //   ];
  //   return $element;
  // }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) 
  {
    $value = isset($items[$delta]->color) ? $items[$delta]->color : '';

    $element['r'] = [
      '#type' => 'number',
      '#title' => $this->t('R'),
      // '#default_value' => !empty($value) ? hexdec(substr($value, 1, 2)) : '',
      '#min' => 0,
      '#max' => 255,
      // '#size' => $this->getSetting('size'),
    ];

    $element['g'] = [
      '#type' => 'number',
      '#title' => $this->t('G'),
      // '#default_value' => !empty($value) ? hexdec(substr($value, 3, 2)) : '',
      '#min' => 0,
      '#max' => 255,
      // '#size' => $this->getSetting('size'),
    ];

    $element['b'] = [
      '#type' => 'number',
      '#title' => $this->t('B'),
      // '#default_value' => !empty($value) ? hexdec(substr($value, 5, 2)) : '',
      '#min' => 0,
      '#max' => 255,
      // '#size' => $this->getSetting('size'),
    ];

    return ['color' => $element];
  }
    
  // /**
  //  * {@inheritdoc}
  //  */
  // public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
  //   $rgb_values = [];
  //   foreach ($values as $item) {
  //     $r = str_pad($item['r'], 2, '0', STR_PAD_LEFT);
  //     $g = str_pad($item['g'], 2, '0', STR_PAD_LEFT);
  //     $b = str_pad($item['b'], 2, '0', STR_PAD_LEFT);
  //     $rgb_values[] = "#$r$g$b";
  //   }
  //   return $rgb_values;
  // }

  // /**
  //  * {@inheritdoc}
  //  */
  // public function settingsSummary()
  // {
  //   $summary = [];
  //   $summary[] = $this->t("Size text: @size", array("@size" => $this->getSetting("size")));
  //   return $summary;
  // }
}
