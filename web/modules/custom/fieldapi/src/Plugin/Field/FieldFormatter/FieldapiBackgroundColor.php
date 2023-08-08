<?php

namespace Drupal\fieldapi\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'fieldapi_color_code_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "fieldapi_color_background_formatter",
 *   label = @Translation("Color background Formatter"),
 *   field_types = {
 *     "custom_colour_field"
 *   }
 * )
 */
class FieldapiBackgroundColor extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'text' => 'Sample Text',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $element = parent::settingsForm($form, $form_state);

    $element['text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Static Text'),
      '#default_value' => $this->getSetting('text'),
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Static Text: @text', ['@text' => $this->getSetting('text')]);
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    $text = $this->getSetting('text');

    foreach ($items as $delta => $item) {
      $color = $item->color;
      var_dump($color);
      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => '<div style="background-color: ' . $color . '; color: black; padding: 5px;">' . $text . '</div>',
        // '#markup' => '<div style="background-color: ' . $color . '; padding: 5px;"> </div>',
      ];
    }

    return $elements;
  }

}
