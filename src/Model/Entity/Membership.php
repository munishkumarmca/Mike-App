<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Membership Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property float $price
 * @property string $validity_type
 * @property int $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Membership extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'status' => true,
        'price' => true,
        'validity_type' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true
    ];
}
