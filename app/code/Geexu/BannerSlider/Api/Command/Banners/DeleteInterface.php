<?php

namespace   Geexu\BannerSlider\Api\Command\Banners;

/**
 * Interface DeleteInterface
 * @package Geexu\BannerSlider\Api\Command\Banners
 */
interface DeleteInterface {

    /**
     * @param \Geexu\BannerSlider\Api\Data\BannersInterface $banners
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface
     */
    public function execute(\Geexu\BannerSlider\Api\Data\BannersInterface $banners);
}
