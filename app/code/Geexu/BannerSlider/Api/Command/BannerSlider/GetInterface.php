<?php

namespace   Geexu\BannerSlider\Api\Command\BannerSlider;

use Geexu\BannerSlider\Api\Data\BannerSliderInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Interface GetInterface
 * @package Geexu\BannerSlider\Api\Command\BannerSlider
 */
interface GetInterface {

    /**
     * @param $bannerSliderId
     * @return BannerSliderInterface
     * @throws LocalizedException
     */
    public function execute($bannerSliderId);
}
