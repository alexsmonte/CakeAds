<?php
namespace CakeAds\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ad Entity
 *
 * @property int $id
 * @property int $category_id
 * @property string $type
 * @property string $url
 * @property string $img
 * @property string $text
 * @property bool $active
 * @property int $clicks
 * @property int $views
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \CakeAds\Model\Entity\Category $category
 * @property \CakeAds\Model\Entity\Statistic[] $statistics
 */
class Ad extends Entity
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
