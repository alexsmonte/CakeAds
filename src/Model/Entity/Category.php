<?php
namespace CakeAds\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $name
 * @property string $parent_id
 * @property int $lft
 * @property int $rght
 *
 * @property \CakeAds\Model\Entity\ParentCategory $parent_category
 * @property \CakeAds\Model\Entity\Ad[] $ads
 * @property \CakeAds\Model\Entity\ChildCategory[] $child_categories
 * @property \CakeAds\Model\Entity\CknCategoriesPost[] $ckn_categories_posts
 */
class Category extends Entity
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
        '*' => true,
        'id' => false
    ];
}
