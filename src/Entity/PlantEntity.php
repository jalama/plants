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

}