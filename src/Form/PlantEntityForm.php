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

    $family = array(
      'nightshades' => $this->t('Nightshades'),
      'morning_glory' => $this->t('Morning Glory'),
      'melons_squash' => $this->t('Melons & Squash'),
      'goosefoot' => $this->t('Goosefoot'),
      'sunflower' => $this->t('Sunflower'),
      'brassicas' => $this->t('Cole or Brassicas'),
      'onions' => $this->t('Onions'),
      'peas' => $this->t('Peas'),
      'grasses' => $this->t('Grasses'),
      'parsely' => $this->t('Parsley'),
    );
    $form['family'] = array(
      '#type' => 'select',
      '#empty_option' => $this->t('-none-'),
      '#title' => $this->t('Plant Family'),
      '#default_value' => $plant->get('family'),
      '#options' => $family,
      '#description' => $this->t('refer to http://www.groworganic.com/organic-gardening/articles/quick-guide-to-vegetable-families-for-crop-rotation'),
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
      '#empty_option' => $this->t('-none-'),
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
      '#title' => $this->t('Average Nighttime Temperature'),
      '#description' => $this->t('Value between 0 and 100'),
      '#default_value' => $plant->get('avg_night_temp'),
      '#options' => range(0, 100),
    );

    $form['diff_daily_temp'] = array(
      '#type' => 'textfield',
      '#maxlength' => 3,
      '#title' => $this->t('Difference in Daily Temperature'),
      '#description' => $this->t('Value between 0 and 100'),
      '#default_value' => $plant->get('diff_daily_temp'),
      '#options' => range(0, 100),
    );

    $form['row_dist'] = array(
      '#type' => 'number',
      '#maxlength' => 3,
      '#title' => $this->t('Distance between the rows'),
      '#description' => $this->t('In inches'),
      '#default_value' => $plant->get('row_dist'),
    );

    $form['seed_dist'] = array(
      '#type' => 'number',
      '#maxlength' => 3,
      '#title' => $this->t('Distance between the seeds'),
      '#description' => $this->t('In inches'),
      '#default_value' => $plant->get('seed_dist'),
    );

    $form['hill'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Hill the plant?'),
      '#description' => $this->t('Does this plant prefer hills'),
      '#default_value' => $plant->get('hill'),
    );

    $form['hill_dist'] = array(
      '#type' => 'number',
      '#maxlength' => 3,
      '#title' => $this->t('Distance between the hills'),
      '#description' => $this->t('In inches'),
      '#default_value' => $plant->get('hill_dist'),
    );

    $form['raised_rows'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Plant on raised rows?'),
      '#default_value' => $plant->get('raised_rows'),
    );

    $form['cover_crop'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Is this a cover crop'),
      '#default_value' => $plant->get('cover_crop'),
    );

    $plants =$this->getPlants();
    if (count($plants)) {
      $form['companions'] = array(
	'#type' => 'select',
	'#empty_option' => $this->t('-none-'),
	'#title' => $this->t('Companion Plants'),
	'#multiple' => TRUE,
	'#default_value' => $plant->get('companions'),
	'#options' => $plants,
	'#description' => $this->t('Companions plants that grow well in conjunction with this plant'),
      );
    }
    return $form;
  }

  private function getPlants() {
    $plants = [];
    $plant = $this->entity;
    $all_plants = $plant->loadMultiple();
    if ($plant->id() !== null) {
      unset($all_plants[$plant->id()]);
    }
    foreach($all_plants as $id => $class) {
      $plants[$id] = $class->label();
    }
    return $plants;
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
