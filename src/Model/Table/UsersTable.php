<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\Archive-imagesTable|\Cake\ORM\Association\HasMany $Archive-images
 * @property \App\Model\Table\AttachmentsTable|\Cake\ORM\Association\HasMany $Attachments
 * @property \App\Model\Table\CommentsTable|\Cake\ORM\Association\HasMany $Comments
 * @property \App\Model\Table\ForumsTable|\Cake\ORM\Association\HasMany $Forums
 * @property \App\Model\Table\NewslettersTable|\Cake\ORM\Association\HasMany $Newsletters
 * @property \App\Model\Table\PagesTable|\Cake\ORM\Association\HasMany $Pages
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->hasMany('Archive-images', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Attachments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Forums', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Newsletters', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Pages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'user_id'
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
            ->scalar('login')
            ->maxLength('login', 250)
            ->requirePresence('login', 'create')
            ->notEmpty('login');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 250)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 250)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 250)
            ->allowEmpty('last_name');

        $validator
            ->scalar('display_name')
            ->maxLength('display_name', 250)
            ->allowEmpty('display_name');
     
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
        $rules->add($rules->isUnique(['login']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
	
	  /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault_a(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('login', 'create')
            ->notEmpty('login');
			
		$validator->requirePresence('email')
		->add('email', 'validFormat', [
        'rule' => 'email',
        'message' => 'E-mail must be valid'
		]);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

       	return $validator;
    }
	public function validationPassword(Validator $validator ) {
		$validator 
			->add('old_password','custom',[ 
				'rule'=> function($value, $context){
					$user = $this->get($context['data']['id']); 
					
					if ($user) { 
						if ((new DefaultPasswordHasher)->check($value, $user->admin_password)) { 
							return true; 
						} 
					}
					return false; 
				}, 
				'message'=>'The old password is incorrect.', 
			]) 
			->notEmpty('old_password'); 
			
		$validator 
			->add('new_password', [ 
				'length' => [ 
					'rule' => ['minLength', 6], 
					'message' => 'The new password must have at least 6 characters.', 
				]
			]) 
			->add('new_password',[ 
				'match'=>[ 
					'rule'=> ['compareWith','confirm_password'], 
					'message'=>'The new password and confirm password must be same.', 
				]
			])
			->notEmpty('new_password'); 
			
		$validator 
			->add('confirm_password', [ 
				'length' => [ 
					'rule' => ['minLength', 6], 
					'message' => 'The confirm password must have at least 6 characters.', 
				]
			]) 
			->add('confirm_password',[ 
				'match'=>[ 
					'rule'=> ['compareWith','new_password'], 
					'message'=>'The new password and confirm password must be same.', 
				]
			])
			->notEmpty('confirm_password'); 
			return $validator; 
	}
	
	public function validationResetPassword(Validator $validator ) {
		
		$validator 
			->add('new_password', [ 
				'length' => [ 
					'rule' => ['minLength', 6], 
					'message' => 'The new password must have at least 6 characters.', 
				]
			]) 
			->add('new_password',[ 
				'match'=>[ 
					'rule'=> ['compareWith','confirm_password'], 
					'message'=>'The new password and confirm password must be same.', 
				]
			])
			->notEmpty('new_password'); 
			
		$validator 
			->add('confirm_password', [ 
				'length' => [ 
					'rule' => ['minLength', 6], 
					'message' => 'The confirm password must have at least 6 characters.', 
				]
			]) 
			->add('confirm_password',[ 
				'match'=>[ 
					'rule'=> ['compareWith','new_password'], 
					'message'=>'The new password and confirm password must be same.', 
				]
			])
			->notEmpty('confirm_password'); 
		return $validator; 
	}
}
