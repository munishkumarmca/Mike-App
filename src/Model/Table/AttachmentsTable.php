<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attachments Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\Archive-imagesTable|\Cake\ORM\Association\HasMany $Archive-images
 * @property \App\Model\Table\NewslettersTable|\Cake\ORM\Association\HasMany $Newsletters
 *
 * @method \App\Model\Entity\Attachment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Attachment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Attachment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Attachment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Attachment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Attachment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Attachment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttachmentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('attachments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Archive-images', [
            'foreignKey' => 'attachment_id'
        ]);
        $this->hasMany('Newsletters', [
            'foreignKey' => 'attachment_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('thumb_url')
            ->maxLength('thumb_url', 500)
            ->requirePresence('thumb_url', 'create')
            ->notEmpty('thumb_url');

        $validator
            ->scalar('full_url')
            ->maxLength('full_url', 500)
            ->requirePresence('full_url', 'create')
            ->notEmpty('full_url');

        $validator
            ->scalar('path')
            ->maxLength('path', 500)
            ->requirePresence('path', 'create')
            ->notEmpty('path');

        $validator
            ->scalar('label')
            ->maxLength('label', 355)
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        $validator
            ->integer('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('associated', 'create')
            ->notEmpty('associated');

        $validator
            ->scalar('type')
            ->maxLength('type', 150)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        $validator
            ->integer('size')
            ->requirePresence('size', 'create')
            ->notEmpty('size');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
