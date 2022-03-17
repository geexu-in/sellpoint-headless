<?php

namespace   Geexu\BannerSlider\Api\Command\BannerSlider;

use Geexu\BannerSlider\Api\Data\BannerSliderInterface;

/**
 * Interface DeleteInterface
 * @package Geexu\BannerSlider\Api\Command\BannerSlider
 */
interface DeleteInterface {

    /**
     * @param BannerSliderInterface $bannerSlider
     * @return BannerSliderInterface
     */
    public function execute(BannerSliderInterface $bannerSlider);
}
