<?php

/**
 * @file
 * Contains \Drupal\quickedit\Tests\QuickEditTestBase.
 */

namespace Drupal\quickedit\Tests;

use Drupal\simpletest\DrupalUnitTestBase;

/**
 * Base class for testing Quick Edit functionality.
 */
abstract class QuickEditTestBase extends DrupalUnitTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('system', 'entity', 'entity_test', 'field', 'field_test', 'filter', 'user', 'text', 'quickedit');

  /**
   * Bag of created fields and instances.
   *
   * Allows easy access to test field/instance names/IDs/objects via:
   * - $this->fields->{$field_name}_field_storage
   * - $this->fields->{$field_name}_instance
   *
   * @see \Drupal\quickedit\Tests\QuickEditTestBase::createFieldWithInstance()
   *
   * @var \ArrayObject
   */
  protected $fields;

  /**
   * Sets the default field storage backend for fields created during tests.
   */
  protected function setUp() {
    parent::setUp();

    $this->fields = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);

    $this->installEntitySchema('entity_test');
    $this->installConfig(array('field', 'filter'));
  }

  /**
   * Creates a field and an instance of it.
   *
   * @param string $field_name
   *   The field name.
   * @param string $type
   *   The field type.
   * @param int $cardinality
   *   The field's cardinality.
   * @param string $label
   *   The field's label (used everywhere: widget label, formatter label).
   * @param array $instance_settings
   * @param string $widget_type
   *   The widget type.
   * @param array $widget_settings
   *   The widget settings.
   * @param string $formatter_type
   *   The formatter type.
   * @param array $formatter_settings
   *   The formatter settings.
   */
  protected function createFieldWithInstance($field_name, $type, $cardinality, $label, $instance_settings, $widget_type, $widget_settings, $formatter_type, $formatter_settings) {
    $field_storage = $field_name . '_field_storage';
    $this->fields->$field_storage = entity_create('field_storage_config', array(
      'name' => $field_name,
      'entity_type' => 'entity_test',
      'type' => $type,
      'cardinality' => $cardinality,
    ));
    $this->fields->$field_storage->save();

    $instance = $field_name . '_instance';
    $this->fields->$instance = entity_create('field_instance_config', array(
      'field_storage' => $this->fields->$field_storage,
      'bundle' => 'entity_test',
      'label' => $label,
      'description' => $label,
      'weight' => mt_rand(0, 127),
      'settings' => $instance_settings,
    ));
    $this->fields->$instance->save();

    entity_get_form_display('entity_test', 'entity_test', 'default')
      ->setComponent($field_name, array(
        'type' => $widget_type,
        'label' => $label,
        'settings' => $widget_settings,
      ))
      ->save();

    entity_get_display('entity_test', 'entity_test', 'default')
      ->setComponent($field_name, array(
        'label' => 'above',
        'type' => $formatter_type,
        'settings' => $formatter_settings
      ))
      ->save();
  }

}
