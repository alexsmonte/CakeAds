<?php
use Cake\Core\Configure;

if (!Configure::read('CakeAds.type')) {
    Configure::write('CakeAds.type', ['I' => __('Image'), 'T' => __('Text')]);
}

if (!Configure::read('CakeAds.path')) {
    Configure::write('CakeAds.path', 'ads{DS}{year}{DS}{month}{DS}');
}

if (!Configure::read('CakeAds.keepFilesOnDelete')) {
    Configure::write('CakeAds.keepFilesOnDelete', false);
}

if (!Configure::read('CakeAds.file')) {
    Configure::write('CakeAds.file', ROOT. DS . 'config' . DS ."ads.php");
}