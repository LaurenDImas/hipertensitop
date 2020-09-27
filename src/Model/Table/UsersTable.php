<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
      public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
        ]);
    }
    public function validationDefault(Validator $validator)
    {
       $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', true)
            ->notEmpty('username','Harap masukan username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message'=>'Username telah digunakan harap pilih username yang lain']);

        $validator
            ->scalar('password')
            ->maxLength('password', 60)
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->allowEmpty('password','update');

        $validator
            ->scalar('role_id')
            ->maxLength('role_id', 60)
            ->requirePresence('role_id', 'create')
            ->notEmpty('role_id');



        // $validator
        //     ->scalar('current_password')
        //     ->maxLength('current_password', 60)
        //     ->requirePresence('current_password', 'create')
        //     ->notEmpty('current_password')
        //     ->allowEmpty('current_password','update')
        //     ->add('current_password', [
        //         'checkCurrentPassword'=>[
        //             'rule' => 'checkCurrentPassword',
        //             'provider' => 'table',
        //             'message' => 'Password yang sebelumnya salah silahkan ulangi kembali'
        //         ]
        //     ]);

        return $validator;
    }

}