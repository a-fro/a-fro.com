<?php

/**
 * @file
 * Contains \Drupal\disqus\Element\Disqus.
 */

namespace Drupal\disqus\Element;

use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides disqus module's render element properties
 *
 * @RenderElement("disqus")
 */
class Disqus extends RenderElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return array(
      '#disqus' => array(),
      '#theme_wrappers' => array('disqus_noscript', 'container'),
      '#attributes' => array('id' => 'disqus_thread'),
    );
  }

  /**
   * Post render function of the Disqus element to inject the Disqus JavaScript.
   */
  public static function disqus_element_post_render_cache($entity_type_id, $entity_id) {
    $element['#type'] = 'disqus';
    $element = [
      '#disqus' => [],
      '#theme_wrappers' => ['disqus_noscript', 'container'],
      '#attributes' => ['id' => 'disqus_thread'],
    ];
    $entity = \Drupal::entityManager()->getStorage($entity_type_id)->load($entity_id);
    // Construct the settings to be passed in for Disqus.
    $disqus = array(
      'domain' => \Drupal::config('disqus.settings')->get('disqus_domain'),
      'url' => $entity->url('canonical',array('absolute' => TRUE)),
      'title' => $entity->label(),
      'identifier' => "{$entity->getEntityTypeId()}/{$entity->id()}",
    );
    $disqus['disable_mobile'] = \Drupal::config('disqus.settings')->get('behavior.disqus_disable_mobile');

    // If the user is logged in, we can inject the username and email for Disqus.
    $account = \Drupal::currentUser();

    if (\Drupal::config('disqus.settings')->get('behavior.disqus_inherit_login') && !$account->isAnonymous()) {
      $disqus['name'] = $account->getUsername();
      $disqus['email'] = $account->getEmail();
    }

    // Provide alternate language support if desired.
    if (\Drupal::config('disqus.settings')->get('behavior.disqus_localization')) {
      $language = \Drupal::languageManager()->getCurrentLanguage();
      $disqus['language'] = $language->id;
    }

    // Check if we are to provide Single Sign-On access.
    if (\Drupal::config('disqus.settings')->get('advanced.sso.disqus_sso')) {
      $disqus += \Drupal::service('disqus.manager')->disqus_sso_disqus_settings();
    }

    // Check if we want to track new comments in Google Analytics.
    if (\Drupal::config('disqus.settings')->get('behavior.disqus_track_newcomment_ga')) {
      // Add a callback when a new comment is posted.
      $disqus['callbacks']['onNewComment'][] = 'Drupal.disqus.disqusTrackNewComment';
      // Attach the js with the callback implementation.
      $element['#attached']['library'][] = 'disqus/ga';
    }

    /**
     * Pass callbacks on if needed. Callbacks array is two dimensional array
     * with callback type as key on first level and array of JS callbacks on the
     * second level.
     *
     * Example:
     * @code
     * $element['#disqus']['callbacks'] = array(
     *   'onNewComment' => array(
     *     'myCallbackThatFiresOnCommentPost',
     *     'Drupal.mymodule.anotherCallbInsideDrupalObj',
     *   ),
     * );
     * @endcode
     */
    if (!empty($element['#disqus']['callbacks'])) {
      $disqus['callbacks'] = $element['#disqus']['callbacks'];
    }
    // Add the disqus.js and all the settings to process the JavaScript and load Disqus.
    $element['#attached']['library'][] = 'disqus/disqus';
    $element['#attached']['drupalSettings']['disqus'] = $disqus;
    return $element;
  }

}
