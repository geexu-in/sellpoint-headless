<?php

namespace Geexu\BannerSlider\Model\ResourceModel\BannerSlider;

/**
 * Class Collection
 * @package Geexu\BannerSlider\Model\ResourceModel\BannerSlider
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
            \Geexu\BannerSlider\Model\BannerSlider::class,
            \Geexu\BannerSlider\Model\ResourceModel\BannerSlider::class
        );
    }
}
