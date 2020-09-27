<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MengenaiHipertensi Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $photo
 * @property string|null $dir
 * @property string|null $link_1
 * @property string|null $link_2
 * @property bool|null $status
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class MengenaiHipertensi extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'photo' => true,
        'dir' => true,
        'link_1' => true,
        'link_2' => true,
        'status' => true,
        'created_by' => true,
        'modified_by' => true,
        'created' => true,
        'modified' => true,
    ];
}
