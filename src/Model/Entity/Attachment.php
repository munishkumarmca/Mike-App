<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attachment Entity
 *
 * @property int $id
 * @property string $thumb_url
 * @property string $full_url
 * @property string $path
 * @property int $user_id
 * @property string $label
 * @property int $description
 * @property int $associated
 * @property string $type
 * @property int $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $size
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Archive-image[] $archive_images
 * @property \App\Model\Entity\Newsletter[] $newsletters
 */
class Attachment extends Entity
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
        'thumb_url' => true,
        'full_url' => true,
        'path' => true,
        'user_id' => true,
        'label' => true,
        'description' => true,
        'associated' => true,
        'type' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'size' => true,
        'user' => true,
        'archive_images' => true,
        'newsletters' => true
    ];
}
