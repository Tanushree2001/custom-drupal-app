<?php

namespace Drupal\fieldapi\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Define the Fieldapi Field Formatter
 * 
 * @FieldFormatter(
 *   id = "fieldapi_field_formatter",
 *   label = @Translation("Fieldapi Field Formatter"),
 *   description = @Translation("Fieldapi Field Formatter"),
 *   field_types = {
 *     "custom_field_type"
 *   }
 * )
 */

class FieldapiFieldFormatter extends FormatterBase {
  
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings()
  {
    return [
      'concat' => 'Concat with',
    ] + parent::defaultSettings();
  }
  
  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state)
  {
    $element = [];
    $element['concat'] = [
      '#type' => 'textfield',
      '#title' => 'Concatenate with',
      '#default_value' => $this->getSetting("concat"),
    ];
    return $element;
  }
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode){
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#markup' => $item->value,
      ];
    }
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary()
  {
    $summary = [];
    $summary[] = $this->t("Contatenated text: @concat", array("@concat" => $this->getSetting("concat")));
    return $summary;
  }
}
 