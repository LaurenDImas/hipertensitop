<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PesanKesehatan Model
 *
 * @method \App\Model\Entity\PesanKesehatan get($primaryKey, $options = [])
 * @method \App\Model\Entity\PesanKesehatan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PesanKesehatan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PesanKesehatan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PesanKesehatan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PesanKesehatan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PesanKesehatan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PesanKesehatan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PesanKesehatanTable extends Table
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

        $this->setTable('pesan_kesehatan');
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
            ->scalar('kondisi')
            ->maxLength('kondisi', 100)
            ->allowEmptyString('kondisi');

        $validator
            ->scalar('cop')
            ->maxLength('cop', 16777215)
            ->allowEmptyString('cop');

        $validator
            ->scalar('pesan')
            ->maxLength('pesan', 16777215)
            ->allowEmptyString('pesan');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->integer('kode')
            ->allowEmptyString('kode');

        return $validator;
    }
}
