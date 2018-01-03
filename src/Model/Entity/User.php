<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $display_name
 * @property string $image
 * @property \Cake\I18n\FrozenTime $last_logged_in
 * @property int $role_id
 * @property \Cake\I18n\FrozenTime $end_date
 * @property \Cake\I18n\FrozenTime $dob
 * @property int $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Archive-image[] $archive_images
 * @property \App\Model\Entity\Attachment[] $attachments
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Forum[] $forums
 * @property \App\Model\Entity\Newsletter[] $newsletters
 * @property \App\Model\Entity\Page[] $pages
 * @property \App\Model\Entity\Payment[] $payments
 */
class User extends Entity
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
        'login' => true,
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'display_name' => true,
        'image' => true,
        'last_logged_in' => true,
        'role_id' => true,
        'end_date' => true,
        'dob' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'archive_images' => true,
        'attachments' => true,
        'comments' => true,
        'forums' => true,
        'newsletters' => true,
        'pages' => true,
        'payments' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	
	protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
