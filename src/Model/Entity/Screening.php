<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Screening Entity
 *
 * @property int $id
 * @property string|null $nama
 * @property int|null $telp
 * @property \Cake\I18n\FrozenDate|null $birthdate
 * @property int|null $gender
 * @property int|null $tempat_pengukuran_td
 * @property int|null $luar_klinik
 * @property int|null $sistol
 * @property int|null $diastol
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property int|null $status
 */
class Screening extends Entity
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
        'nama' => true,
        'telp' => true,
        'birthdate' => true,
        'gender' => true,
        'tempat_pengukuran_td' => true,
        'luar_klinik' => true,
        'sistol' => true,
        'diastol' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'status' => true,
    ];
}
