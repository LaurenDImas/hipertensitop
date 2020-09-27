<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Screenings Model
 *
 * @method \App\Model\Entity\Screening get($primaryKey, $options = [])
 * @method \App\Model\Entity\Screening newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Screening[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Screening|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Screening saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Screening patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Screening[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Screening findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScreeningsTable extends Table
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

        $this->setTable('screenings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nama')
            ->maxLength('nama', 255)
            ->allowEmptyString('nama');

        $validator
            ->allowEmptyString('telp');

        $validator
            ->date('birthdate')
            ->allowEmptyDate('birthdate');

        $validator
            ->integer('gender')
            ->allowEmptyString('gender');

        $validator
            ->integer('tempat_pengukuran_td')
            ->allowEmptyString('tempat_pengukuran_td');

        $validator
            ->integer('luar_klinik')
            ->allowEmptyString('luar_klinik');

        $validator
            ->integer('sistol')
            ->allowEmptyString('sistol');

        $validator
            ->integer('diastol')
            ->allowEmptyString('diastol');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        return $validator;
    }
}
