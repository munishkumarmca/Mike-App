<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forums Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CommentsTable|\Cake\ORM\Association\HasMany $Comments
 *
 * @method \App\Model\Entity\Forum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Forum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Forum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Forum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Forum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Forum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Forum findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ForumsTable extends Table
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

        $this->setTable('forums');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'forum_id'
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
            ->scalar('uniue_str')
            ->maxLength('uniue_str', 255)
            ->requirePresence('uniue_str', 'create')
            ->notEmpty('uniue_str');

        $validator
            ->scalar('title')
            ->maxLength('title', 500)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('excerpt')
            ->requirePresence('excerpt', 'create')
            ->notEmpty('excerpt');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('content')
            ->maxLength('content', 4294967295)
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        $validator
            ->scalar('comment_status')
            ->requirePresence('comment_status', 'create')
            ->notEmpty('comment_status');

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
