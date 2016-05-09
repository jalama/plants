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

    $form['sow_inside'] = array(
      '#type' => 'number',
      '#title' => $this->t('Sow inside date'),
      '#description' => $this->t('How many days before first frost does plant get sown inside, in seconds'),
      '#default_value' => $plant->get('sow_inside'),
    );

    $form['sow_outside'] = array(
      '#type' => 'number',
      '#title' => $this->t('Sow outside date'),
      '#description' => $this->t('How many days before first frost does plant get sown outside, in seconds'),
      '#default_value' => $plant->get('sow_outside'),
    );

    $form['maturity'] = array(
      '#type' => 'number',
      '#title' => $this->t('Maturity'),
      '#description' => $this->t('How many days until the plant is matured, in seconds'),
      '#default_value' => $plant->get('maturity'),
    );

    $form['soil_temp'] = array(
      '#type' => 'number',
      '#title' => $this->t('Soil Temperature'),
      '#description' => $this->t('Ideal soil temperature'),
      '#default_value' => $plant->get('soil_temp'),
    );

    $form['soil_ph'] = array(
      '#type' => 'number',
      '#title' => $this->t('Soil PH'),
      '#description' => $this->t('Ideal soil PH, value betwee 0 - 14'),
      '#default_value' => $plant->get('soil_ph'),
      '#options' => range(0, 14),
    );

    $form['exposure'] = array(
      '#type' => 'select',
      '#title' => $this->t('Exposure'),
      '#description' => $this->t('Ideal sun exposure'),
      '#default_value' => $plant->get('exposure'),
      '#options' => array('full_sun' => t('Full Sun'), 'part_sun' => t('Part Sun'), 'part_shade' => t('Part Shade'), 'full_shade' => ('Full Shade')),
    );

    $form['max_daily_temp'] = array(
      '#type' => 'textfield',
      '#maxlength' => 3,
      '#title' => $this->t('Maximum Daily Temperautre'),
      '#description' => $this->t('Value between 0 and 100'),
      '#default_value' => $plant->get('max_daily_temp'),
      '#options' => range(0, 100),
    );

    $form['min_daily_temp'] = array(
      '#type' => 'textfield',
      '#maxlength' => 3,
      '#title' => $this->t('Minimum Daily Temperautre'),
      '#description' => $this->t('Value between 0 and 100'),
      '#default_value' => $plant->get('min_daily_temp'),
      '#options' => range(0, 100),
    );

    $form['avg_day_temp'] = array(
      '#type' => 'textfield',
      '#maxlength' => 3,
      '#title' => $this->t('Average Daytime Temperautre'),
      '#description' => $this->t('Value between 0 and 100'),
      '#default_value' => $plant->get('avg_day_temp'),
      '#options' => range(0, 100),
    );

    $form['avg_night_temp'] = array(
      '#type' => 'textfield',
      '#maxlength' => 3,
      '#title' => $this->t('Average Nighttime Temperautre'),
      '#description' => $this->t('Value between 0 and 100'),
      '#default_value' => $plant->get('avg_night_temp'),
      '#options' => range(0, 100),
    );

    $form['diff_daily_temp'] = array(
      '#type' => 'textfield',
      '#maxlength' => 3,
      '#title' => $this->t('Diference in Daily Temperautre'),
      '#description' => $this->t('Value between 0 and 100'),
      '#default_value' => $plant->get('diff_daily_temp'),
      '#options' => range(0, 100),
    );

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
