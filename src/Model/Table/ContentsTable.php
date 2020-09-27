<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contents Model
 *
 * @method \App\Model\Entity\Content get($primaryKey, $options = [])
 * @method \App\Model\Entity\Content newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Content[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Content|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Content[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Content findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentsTable extends Table
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

        $this->setTable('contents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');


        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo' => [
                'fields' => [
                    'dir' => 'dir',
                ],
                'path' => 'webroot{DS}assets{DS}uploaded_data{DS}images',
                'nameCallback' => function($table,$entity,$data,$field,$settings){
                    $name = md5(date('YmdHis'));
                    $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
                    return $name.'.'.$extension;
                },
                'keepFilesOnDelete' => false
            ],
            'logo' => [
                'fields' => [
                    'dir' => 'logo_dir',
                ],
                'path' => 'webroot{DS}assets{DS}uploaded_data{DS}logo',
                'nameCallback' => function($table,$entity,$data,$field,$settings){
                    $name = md5(date('YmdHis'));
                    $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
                    return $name.'.'.$extension;
                },
                'keepFilesOnDelete' => false
            ],
            'banner1' => [
                'fields' => [
                    'dir' => 'banner1_dir',
                ],
                'path' => 'webroot{DS}assets{DS}uploaded_data{DS}banner1',
                'nameCallback' => function($table,$entity,$data,$field,$settings){
                    $name = md5(date('YmdHis'));
                    $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
                    return $name.'.'.$extension;
                },
                'keepFilesOnDelete' => false
            ],
            'banner2' => [
                'fields' => [
                    'dir' => 'banner2_dir',
                ],
                'path' => 'webroot{DS}assets{DS}uploaded_data{DS}banner2',
                'nameCallback' => function($table,$entity,$data,$field,$settings){
                    $name = md5(date('YmdHis'));
                    $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
                    return $name.'.'.$extension;
                },
                'keepFilesOnDelete' => false
            ],
            'footer' => [
                'fields' => [
                    'dir' => 'footer_dir',
                ],
                'path' => 'webroot{DS}assets{DS}uploaded_data{DS}footer',
                'nameCallback' => function($table,$entity,$data,$field,$settings){
                    $name = md5(date('YmdHis'));
                    $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
                    return $name.'.'.$extension;
                },
                'keepFilesOnDelete' => false
            ],
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
        // $validator->provider('upload', \Josegonzalez\Upload\Validation\UploadValidation::class);

        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        
        $validator
            ->allowEmptyFile('photo')
            ->add('photo', [
            'validExtension' => [
                'rule' => ['extension', ['jpg','jpeg','png','svg']],
                'message' => ('Tidak Sesuai extensi!')
            ]
        ]);

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

       
        $validator
            ->allowEmptyFile('logo')
            ->add('photo', [
            'validExtension' => [
                'rule' => ['extension', ['jpg','jpeg','png','svg','pdf']],
                'message' => ('Tidak Sesuai extensi!')
            ]
        ]);

        $validator
            ->allowEmptyString('logo_dir');

        
        $validator
            ->allowEmptyFile('banner1')
            ->add('banner1', [
            'validExtension' => [
                'rule' => ['extension', ['jpg','jpeg','png','svg','pdf']],
                'message' => ('Tidak Sesuai extensi!')
            ]
        ]);

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
            ->allowEmptyFile('banner2')
            ->add('banner2', [
            'validExtension' => [
                'rule' => ['extension', ['jpg','jpeg','png','svg','pdf']],
                'message' => ('Tidak Sesuai extensi!')
            ]
        ]);

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
            ->allowEmptyFile('footer')
            ->add('footer', [
            'validExtension' => [
                'rule' => ['extension', ['jpg','jpeg','png','svg','pdf']],
                'message' => ('Tidak Sesuai extensi!')
            ]
        ]);

        $validator
            ->scalar('footer_dir')
            ->maxLength('footer_dir', 255)
            ->allowEmptyString('footer_dir');

        return $validator;
    }
}
