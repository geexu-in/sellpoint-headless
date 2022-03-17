<?php

namespace  Geexu\BannerSlider\Api\Command\BannerSlider;

use Geexu\BannerSlider\Api\Data\BannerSliderInterface;

/**
 * Interface SaveInterface
 * @package Geexu\BannerSlider\Api\Command\BannerSlider
 */
interface SaveInterface {

    /**
     * @param BannerSliderInterface $bannerSlider
     * @return BannerSliderInterface
     */
    public function execute(BannerSliderInterface $bannerSlider);
}
