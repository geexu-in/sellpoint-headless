<?php

namespace   Geexu\BannerSlider\Api\Command\BannerSlider;


use Geexu\BannerSlider\Api\Data\BannerSliderInterface;

/**
 * Interface DeleteByIdInterface
 * @package Geexu\BannerSlider\Api\Command\BannerSlider
 */
interface DeleteByIdInterface {

    /**
     * @param $bannersId
     * @return BannerSliderInterface
     */
    public function execute($bannersId);
}
