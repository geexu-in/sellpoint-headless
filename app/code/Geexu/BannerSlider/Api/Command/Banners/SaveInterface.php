<?php

namespace  Geexu\BannerSlider\Api\Command\Banners;

/**
 * Interface SaveInterface
 * @package Geexu\BannerSlider\Api\Command\Banners
 */
interface SaveInterface {

    /**
     * @param \Geexu\BannerSlider\Api\Data\BannersInterface $banners
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface
     */
    public function execute(\Geexu\BannerSlider\Api\Data\BannersInterface $banners);
}
