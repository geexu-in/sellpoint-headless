<?php

namespace   Geexu\BannerSlider\Api\Command\Banners;

/**
 * Interface DeleteByIdInterface
 * @package Geexu\BannerSlider\Api\Command\Banners
 */
interface DeleteByIdInterface {

    /**
     * @param $bannersId
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface
     */
    public function execute($bannersId);
}
