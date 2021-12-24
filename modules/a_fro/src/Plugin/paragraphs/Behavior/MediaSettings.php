<?php

namespace Drupal\a_fro\Plugin\paragraphs\Behavior;

use Drupal\paragraphs\ParagraphsBehaviorBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\paragraphs\ParagraphInterface;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\paragraphs\Entity\ParagraphsType;
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;

/**
 * Provides a Card paragraph behavior plugin.
 *
 * @ParagraphsBehavior(
 *   id = "a_fro_media",
 *   label = @Translation("Media settings"),
 *   description = @Translation("Configure media component settings."),
 *   weight = 3
 * )
 */
class MediaSettings extends ParagraphsBehaviorBase {

  /**
   * The media component placement options.
   *
   * @var array
   */
  protected $mediaPlacementOptions = [
    'content-width' => 'Content width',
    'full-width' => 'Full-width',
    'portrait-left' => 'Portrait left',
    'portrait-right' => 'Portrait right'
  ];

  /**
   * {@inheritdoc}
   */
  public function buildBehaviorForm(ParagraphInterface $paragraph, array &$form, FormStateInterface $form_state) {
    $form['media_placement'] = [
      '#type' => 'select',
      '#title' => $this->t('Media placement'),
      '#options' => $this->mediaPlacementOptions,
      '#required' => FALSE,
      '#default_value' => $paragraph->getBehaviorSetting($this->getPluginId(), 'media_placement') ?? reset($this->mediaPlacementOptions),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function preprocess(&$variables) {
    $media_placement = $variables['paragraph']->getBehaviorSetting($this->getPluginId(), 'media_placement');

    if ($media_placement) {
      $variables['attributes']['class'][] = 'component component--' . $media_placement;

      if (strpos($media_placement, 'portrait') === 0) {
        $is_promo = FALSE;
        $variables['attributes']['class'][] = 'component--portrait';
        $variables['content']['field_media_item'][0]['#image_style'] = 'portrait';
      }

      if ($media_placement === 'content-width') {
        $variables['content']['field_media_item'][0]['#image_style'] = 'full_content';
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function view(array &$build, Paragraph $paragraphs_entity, EntityViewDisplayInterface $display, $view_mode) {}

  /**
   * {@inheritdoc}
   */
  public function settingsSummary(Paragraph $paragraph) {
    $overlay_opacity = $paragraph->getBehaviorSetting($this->getPluginId(), 'media_overlay_opacity') ?? 50;

    $summary = [];

    if ($paragraph->getBehaviorSetting($this->getPluginId(), 'media_placement')) {
      $summary[] = [
        'label' => $this->t('Media placement'),
        'value' => 'preserved',
      ];
    }

    if ($media_placement = $paragraph->getBehaviorSetting($this->getPluginId(), 'media_placement')) {
      $summary[] = [
        'label' => $this->t('Placement'),
        'value' => $this->mediaPlacementOptions[$media_placement],
      ];
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   *
   * This behavior is only applicable to promo (Card) paragraphs.
   */
  public static function isApplicable(ParagraphsType $paragraphs_type) {
    return in_array($paragraphs_type->id(), ['media']);
  }

}