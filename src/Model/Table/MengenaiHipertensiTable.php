<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MengenaiHipertensi Model
 *
 * @method \App\Model\Entity\MengenaiHipertensi get($primaryKey, $options = [])
 * @method \App\Model\Entity\MengenaiHipertensi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MengenaiHipertensi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MengenaiHipertensi|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MengenaiHipertensi saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MengenaiHipertensi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MengenaiHipertensi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MengenaiHipertensi findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MengenaiHipertensiTable extends Table
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

        $this->setTable('mengenai_hipertensi');
        $this->setDisplayField('name');
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmptyString('photo');

        $validator
            ->scalar('dir')
            ->maxLength('dir', 255)
            ->allowEmptyString('dir');

        $validator
            ->scalar('link_1')
            ->maxLength('link_1', 255)
            ->allowEmptyString('link_1');

        $validator
            ->scalar('link_2')
            ->maxLength('link_2', 255)
            ->allowEmptyString('link_2');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        return $validator;
    }
}
