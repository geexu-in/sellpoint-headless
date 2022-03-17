<?php

namespace Geexu\BannerSlider\Model\ResourceModel;

/**
 * Class Banners
 * @package Geexu\BannerSlider\Model\ResourceModel
 */
class Banners extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('geexu_bannerslider_banners', 'banners_id');
    }
}
