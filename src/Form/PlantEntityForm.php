<?php

namespace Drupal\plants\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class PlantEntityForm.
 *
 * @package Drupal\plants\Form
 */
class PlantEntityForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $plant = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $plant->label(),
      '#description' => $this->t("Label for the Plant."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $plant->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\plants\Entity\PlantEntity::load',
      ),
      '#disabled' => !$plant->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $plant = $this->entity;
    $status = $plant->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Plant.', [
          '%label' => $plant->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Plant.', [
          '%label' => $plant->label(),
        ]));
    }
    $form_state->setRedirectUrl($plant->urlInfo('collection'));
  }

}
