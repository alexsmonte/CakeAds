<?php
namespace CakeAds\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;


/**
 * Ads helper
 */
class AdsHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers =   ['Html'];

    public function banner($category = 'general',$imageOption=[], $linkOption=[])
    {
        if(!file_exists(Configure::read('CakeAds.file')))
            return false;

        $adsFile = include Configure::read('CakeAds.file');

        if (empty($adsFile[$category]))
            return false;

        $linkOption =   array_merge($linkOption, ['escape' => false]);

        $adTable    =   TableRegistry::get("CakeAds.Ads");
        $banner =   $adsFile[$category];

        $randBanner =    rand(0,count($banner)-1);

        $adTable->sumView($banner[$randBanner]["id"]);

        return $this->Html->link($this->Html->image($banner[$randBanner]["img"],$imageOption),$banner[$randBanner]["url"],$linkOption);
    }
}
