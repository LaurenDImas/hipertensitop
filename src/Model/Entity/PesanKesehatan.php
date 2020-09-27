<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PesanKesehatan Entity
 *
 * @property int $id
 * @property string|null $kondisi
 * @property string|null $cop
 * @property string|null $pesan
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $kode
 */
class PesanKesehatan extends Entity
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
        'kondisi' => true,
        'cop' => true,
        'pesan' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'created' => true,
        'kode' => true,
    ];
}
