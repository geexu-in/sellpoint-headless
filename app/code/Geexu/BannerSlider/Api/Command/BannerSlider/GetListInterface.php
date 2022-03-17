<?php

namespace   Geexu\BannerSlider\Api\Command\BannerSlider;

use Geexu\BannerSlider\Api\Data\BannerSliderInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface GetListInterface
 * @package Geexu\BannerSlider\Api\Command\BannerSlider
 */
interface GetListInterface {

    /**
     * @param SearchCriteriaInterface $criteria
     * @return BannerSliderInterface
     */
    public function execute(SearchCriteriaInterface $criteria);
}
