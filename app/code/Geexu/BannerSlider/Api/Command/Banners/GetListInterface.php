<?php

namespace   Geexu\BannerSlider\Api\Command\Banners;

/**
 * Interface GetListInterface
 * @package Geexu\BannerSlider\Api\Command\Banners
 */
interface GetListInterface {

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface
     */
    public function execute(\Magento\Framework\Api\SearchCriteriaInterface $criteria);
}
