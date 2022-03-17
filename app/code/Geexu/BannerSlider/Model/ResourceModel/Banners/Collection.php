<?php


namespace Geexu\BannerSlider\Model\ResourceModel\Banners;

/**
 * Class Collection
 * @package Geexu\BannerSlider\Model\ResourceModel\Banners
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Geexu\BannerSlider\Model\Banners::class,
            \Geexu\BannerSlider\Model\ResourceModel\Banners::class
        );
    }
}
