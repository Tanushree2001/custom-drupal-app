<?php

namespace Drupal\fieldapi\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Define the "Color Code Field Formatter"
 * 
 * @FieldFormatter(
 *   id = "fieldapi_color_code_formatter",
 *   label = @Translation("Color Code"),
 *   description = @Translation("Displays the color code accepted by the user."),
 *   field_types = {
 *     "custom_colour_field"
 *   }
 * )
 */

class FieldapiColorCodeFormatter extends FormatterBase{

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => $item->color,
      ];
    }
    return $elements;
  }
}