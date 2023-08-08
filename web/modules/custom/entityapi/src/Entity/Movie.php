<?php

// namespace Drupal\entityapi\Entity;

// use Drupal\Core\Entity\ContentEntityBase;
// use Drupal\Core\Entity\EntityTypeInterface;
// use Drupal\Core\Entity\EntityChangedTrait;
// use Drupal\Core\Entity\EntityStorageInterface;
// use Drupal\Core\Field\BaseFieldDefinition;
// use Drupal\Core\Entity\EntityPublishedTrait;
// use Drupal\user\UserInterface;
// // use Drupal\Core\Field\FieldStorageDefinitionInterface;
// use Drupal\Core\StringTranslation\TranslatableMarkup;


// /**
//  * Defines the Movie entity.
//  *
//  * @ContentEntityType(
//  *   id = "entity_practice",
//  *   label = @Translation("Movie"),
//  *   handlers = {
//  *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
//  *     "list_builder" = "Drupal\entity_practice\MovieListBuilder",
//  *     "views_data" = "Drupal\views\EntityViewsData",
//  *     "form" = {
//  *       "add" = "Drupal\entity_practice\Form\MovieForm",
//  *       "edit" = "Drupal\entity_practice\Form\MovieForm",
//  *       "delete" = "Drupal\entity_practice\Form\MovieDeleteForm",
//  *     },
//  *   },
//  *   admin_permission = "administer movie",
//  *   fieldable = TRUE,
//  *   base_table = "entity_practice",
//  *   data_table = "entity_practice_field_data"
//  *   revision_table = "movie_entity_revision",
//  *   revision_data_table = "movie_entity_field_revision",
//  *   entity_keys = {
//  *     "id" = "id",
//  *     "label" = "title",
//  *     "revision" = "vid",
//  *     "uuid" = "uuid",
//  *     "status" = "status",
//  *     "published" = "status",
//  *     "uid" = "uid",
//  *     "owner" = "uid",
//  *   },
//  *   links = {
//  *     "canonical" = "/entity_practice/{entity_practice}",
//  *     "edit-form" = "/entity_practice/{entity_practice}/edit",
//  *     "delete-form" = "/entity_practice/{entity_practice}/delete",
//  *     "collection" = "/entity_practice/list",
//  *     "create" = "/entity_practice/create"
//  *   },
//  *   field_ui_base_route = "entity_practice.contact_settings",
//  *   revision_metadata_keys = {
//  *     "revision_user" = "revision_uid",
//  *     "revision_created" = "revision_timestamp",
//  *     "revision_log_message" = "revision_log" 
//  *   }
//  * )
//  */

// class Movie extends ContentEntityBase {

//   use EntityChangedTrait;

//   /**
//    * {@inheritdoc}
//    */
//   public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
//     $fields = parent::baseFieldDefinitions($entity_type);  // provides id and uuid fields

//     $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
//       ->setLabel(('User'))
//       ->setDescription(('The user that created the example.'))
//       ->setSetting('handler', 'default')
//       ->setDisplayOptions('view',[
//         'label' => 'hidden',
//         'type' => 'author',
//         'weight' => 0,
//       ])
//       ->setDisplayOptions('form',[
//         'type' => 'entity_reference_autocomplete',
//         'weight' => 5,
//         'settings' => [
//           'match_operator' => 'CONTAINS',
//           'size' => 60,
//           'autocomplete_type' => 'tags',
//           'placeholder' => '',
//         ],
//       ])
//       ->setDisplayConfigurable('form', TRUE)
//       ->setDisplayConfigurable('view', TRUE);

//     $fields['title'] = BaseFieldDefinition::create('string')
//       ->setLabel(('Title'))
//       ->setDescription(('The title of the movie.'))
//       ->setRequired(TRUE)
//       ->setTranslatable(TRUE)
//       ->setRevisionable(TRUE)
//       ->setSetting('max_length', 255)
//       ->setDisplayOptions('view',[
//         'label' => 'above',
//         'type' => 'string',
//         'weight' => -6,
//       ])
//       ->setDisplayOptions('form', [
//         'type' => 'string_textfield',
//         'weight' => -6,
//       ]);

//     $fields['body'] = BaseFieldDefinition::create('text_long')
//     ->setLabel(('Body'))
//     ->setDescription(('The body of the movie.'))
//     ->setTranslatable(TRUE)
//     ->setRevisionable(TRUE)
//     ->setDisplayOptions('view',[
//       'label' => 'above',
//       'type' => 'text_default',
//       'weight' => -4,
//     ])
//     ->setDisplayOptions('form',[
//       'type' => 'text_textarea',
//       'weight' => -4,
//     ]);

//     $fields['movie_price'] = BaseFieldDefinition::create('decimal')
//     ->setLabel(('Movie Price'))
//     ->setDescription(('The price of the movie.'))
//     ->setRequired(TRUE)
//     ->setDefaultValue('0.00')
//     ->setSettings([
//       'precision' => 10,
//       'scale' => 2,
//     ])
//     ->setDisplayOptions('view',[
//       'label' => 'above',
//       'type' => 'decimal',
//       'weight' => -2,
//     ])
//     ->setDisplayOptions('form', [
//       'type' => 'number',
//       'weight' => -2,
//     ]);

//     $fields['image'] = BaseFieldDefinition::create('image')
//       ->setLabel(('Image'))
//       ->setDescription(('The image of the movie.'))
//       ->setTranslatable(FALSE)
//       ->setSettings([
//         'file_directory' => 'movies',
//         'file_extensions' => 'png jpg jpeg',
//       ])
//       ->setDisplayOptions('view', [
//         'label' => 'hidden',
//         'type' => 'image',
//         'weight' => 0,
//       ])
//       ->setDisplayOptions('form', [
//         'type' => 'image_image',
//         'weight' => 0,
//       ])
//       ->setDisplayConfigurable('form', TRUE)
//       ->setDisplayConfigurable('view', TRUE);

//     $fields['status'] = BaseFieldDefinition::create('boolean')
//       ->setLabel(('Publishing status'))
//       ->setDescription(('A boolean indicating wheather the Offer entity is published'))
//       ->setDefaultValue(TRUE);
//     $fields['created'] = BaseFieldDefinition::create('created')
//       ->setLabel(('Created'))
//       ->setDescription(('The time that the entity was created.'));
//     $fields['changed'] = BaseFieldDefinition::create('changed')
//       ->setLabel(('Changed'))
//       ->setDescription(('The time that the entity was last edited'));


//     return $fields;
//   }
// }
