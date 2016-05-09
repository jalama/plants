<?php

namespace Drupal\plants\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\plants\PlantEntityInterface;

/**
 * Defines the Plant entity.
 *
 * @ConfigEntityType(
 *   id = "plant",
 *   label = @Translation("Plant"),
 *   handlers = {
 *     "list_builder" = "Drupal\plants\PlantEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\plants\Form\PlantEntityForm",
 *       "edit" = "Drupal\plants\Form\PlantEntityForm",
 *       "delete" = "Drupal\plants\Form\PlantEntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\plants\PlantEntityHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "plant",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/gardnr/plant/{plant}",
 *     "add-form" = "/admin/structure/gardnr/plant/add",
 *     "edit-form" = "/admin/structure/gardnr/plant/{plant}/edit",
 *     "delete-form" = "/admin/structure/gardnr/plant/{plant}/delete",
 *     "collection" = "/admin/structure/gardnr/plant"
 *   }
 * )
 */
class PlantEntity extends ConfigEntityBase implements PlantEntityInterface {

  /**
   * The Plant ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Plant label.
   *
   * @var string
   */
  protected $label;

  /**
   * The Plant family.
   *
   * @var string
   */
  protected $family;

  /**
   * The Plant Sow Inside time before frist frost.
   *
   * @var integer
   */
  protected $sow_inside;

  /**
   * The Plant Sow Outside time before frist frost.
   *
   * @var integer
   */
  protected $sow_outside;

  /**
   * Time until maturity.
   *
   * @var integer
   */
  protected $maturity;

  /**
   * Ideal Soil temperature.
   *
   * @var integer
   */
  protected $soil_temp;

  /**
   * Ideal Soil PH.
   *
   * @var float
   */
  protected $soil_ph;

  /**
   * Ideal Sun Exposure.
   *
   * @var string
   */
  protected $exposure;

  /**
   * Maximum Daily Temperature.
   *
   * @var integer
   */
  protected $max_daily_temp;

  /**
   * Minumum Daily Temperature.
   *
   * @var integer
   */
  protected $min_daily_temp;

  /**
   * Average Daytime Temperature.
   *
   * @var integer
   */
  protected $avg_day_temp;

  /**
   * Average Nightime Temperature.
   *
   * @var integer
   */
  protected $avg_night_temp;

  /**
   * Daily Temperture Diffeerence.
   *
   * @var integer
   */
  protected $diff_daily_temp;

  /**
   * Distance between rows.
   *
   * @var integer
   */
  protected $row_dist;

  /**
   * Distance between seeds.
   *
   * @var integer
   */
  protected $seed_dist;

  /**
   * Does plant prefer being planted on hills.
   *
   * @var boolean
   */
  protected $hill;

  /**
   *  Distance between hills.
   *
   * @var integer
   */
  protected $hill_dist;

  /**
   *  Plant with raised rows.
   *
   * @var boolean
   */
  protected $raised_rows;

  /**
   *  Potential Cover crops.
   *
   * @var boolean
   */
  protected $cover_crop;
}
