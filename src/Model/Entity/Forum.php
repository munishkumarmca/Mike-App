<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Forum Entity
 *
 * @property int $id
 * @property string $uniue_str
 * @property string $title
 * @property string $excerpt
 * @property string $status
 * @property string $content
 * @property int $user_id
 * @property int $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $comment_status
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Comment[] $comments
 */
class Forum extends Entity
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
        'uniue_str' => true,
        'title' => true,
        'excerpt' => true,
        'status' => true,
        'content' => true,
        'user_id' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'comment_status' => true,
        'user' => true,
        'comments' => true
    ];
}
