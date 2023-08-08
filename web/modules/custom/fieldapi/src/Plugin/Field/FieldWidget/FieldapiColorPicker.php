<?php

namespace Drupal\fieldapi\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextareaWidget;
use Drupal\Core\Field\WidgetBase;

/**
 * Plugin implementation of the 'color_picker_widget' widget.
 *
 * @FieldWidget(
 *   id = "color_picker_widget",
 *   label = @Translation("Color Picker"),
 *   field_types = {
 *     "custom_colour_field"
 *   }
 * )
 */
class FieldapiColorPicker extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->color) ? $items[$delta]->color : '';

    $element['color'] = [
      '#type' => 'color',
      '#title' => $this->t('Color Picker'),
      '#default_value' => $value,
    ];
    return $element;
  }

  

}
