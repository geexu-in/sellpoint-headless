<?php


namespace Geexu\BannerSlider\Model\ResourceModel;

/**
 * Class BannerSlider
 * @package Geexu\BannerSlider\Model\ResourceModel
 */
class BannerSlider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('geexu_bannerslider_bannerslider', 'bannerslider_id');
    }
}
