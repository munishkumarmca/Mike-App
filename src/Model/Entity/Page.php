<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property int $order
 * @property int $unique_str
 * @property int $title
 * @property int $excerpt
 * @property int $content
 * @property string $status
 * @property string $menu_title
 * @property string $is_menu
 * @property string $is_home
 * @property int $deleted
 * @property int $created
 * @property int $modified
 * @property int $user_id
 * @property int $role_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Role $role
 */
class Page extends Entity
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
        'order' => true,
        'unique_str' => true,
        'title' => true,
        'excerpt' => true,
        'content' => true,
        'status' => true,
        'menu_title' => true,
        'is_menu' => true,
        'is_home' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'role_id' => true,
        'user' => true,
        'role' => true
    ];
}
