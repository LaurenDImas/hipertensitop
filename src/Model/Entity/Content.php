<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $id
 * @property string|null $name
 * @property |null $photo
 * @property string|null $dir
 * @property string|null $link_1
 * @property string|null $link_2
 * @property bool|null $status
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $logo
 * @property string|resource|null $logo_dir
 * @property string|null $banner1
 * @property string|null $banner1_dir
 * @property string|null $banner1_title
 * @property string|null $banner1_desc
 * @property string|null $banner2
 * @property string|null $banner2_dir
 * @property string|null $banner2_title
 * @property string|null $banner2_desc
 * @property string|null $footer
 * @property string|null $footer_dir
 */
class Content extends Entity
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
        'logo' => true,
        'logo_dir' => true,
        'banner1' => true,
        'banner1_dir' => true,
        'banner1_title' => true,
        'banner1_desc' => true,
        'banner2' => true,
        'banner2_dir' => true,
        'banner2_title' => true,
        'banner2_desc' => true,
        'footer' => true,
        'footer_dir' => true,
    ];
}
