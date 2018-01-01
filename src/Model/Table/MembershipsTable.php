<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Memberships Model
 *
 * @method \App\Model\Entity\Membership get($primaryKey, $options = [])
 * @method \App\Model\Entity\Membership newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Membership[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Membership|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Membership patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Membership[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Membership findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MembershipsTable extends Table
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

        $this->setTable('memberships');
        $this->setDisplayField('name');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->scalar('name')
            ->maxLength('name', 11)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('validity_type')
            ->requirePresence('validity_type', 'create')
            ->notEmpty('validity_type');

        $validator
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        return $validator;
    }
}
