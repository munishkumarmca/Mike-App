<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Newsletter Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $attachment_id
 * @property string $title
 * @property string $excerpt
 * @property string $description
 * @property string $status
 * @property int $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Attachment $attachment
 */
class Newsletter extends Entity
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
        'id' => true,
        'user_id' => true,
        'attachment_id' => true,
        'title' => true,
        'excerpt' => true,
        'description' => true,
        'status' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'attachment' => true
    ];
}
