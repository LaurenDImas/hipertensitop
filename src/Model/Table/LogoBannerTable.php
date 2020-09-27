<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LogoBanner Model
 *
 * @method \App\Model\Entity\LogoBanner get($primaryKey, $options = [])
 * @method \App\Model\Entity\LogoBanner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LogoBanner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LogoBanner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogoBanner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogoBanner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LogoBanner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LogoBanner findOrCreate($search, callable $callback = null, $options = [])
 */
class LogoBannerTable extends Table
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

        $this->setTable('logo_banner');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('logo')
            ->maxLength('logo', 255)
            ->allowEmptyString('logo');

        $validator
            ->allowEmptyString('logo_dir');

        $validator
            ->scalar('banner1')
            ->maxLength('banner1', 255)
            ->allowEmptyString('banner1');

        $validator
            ->scalar('banner1_dir')
            ->maxLength('banner1_dir', 255)
            ->allowEmptyString('banner1_dir');

        $validator
            ->scalar('banner1_title')
            ->maxLength('banner1_title', 255)
            ->allowEmptyString('banner1_title');

        $validator
            ->scalar('banner1_desc')
            ->maxLength('banner1_desc', 255)
            ->allowEmptyString('banner1_desc');

        $validator
            ->scalar('banner2')
            ->maxLength('banner2', 255)
            ->allowEmptyString('banner2');

        $validator
            ->scalar('banner2_dir')
            ->maxLength('banner2_dir', 255)
            ->allowEmptyString('banner2_dir');

        $validator
            ->scalar('banner2_title')
            ->maxLength('banner2_title', 255)
            ->allowEmptyString('banner2_title');

        $validator
            ->scalar('banner2_desc')
            ->maxLength('banner2_desc', 255)
            ->allowEmptyString('banner2_desc');

        $validator
            ->scalar('footer')
            ->maxLength('footer', 255)
            ->allowEmptyString('footer');

        $validator
            ->scalar('footer_dir')
            ->maxLength('footer_dir', 255)
            ->allowEmptyString('footer_dir');

        return $validator;
    }
}
