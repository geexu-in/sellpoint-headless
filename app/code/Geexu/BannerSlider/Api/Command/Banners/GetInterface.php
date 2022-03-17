<?php

namespace   Geexu\BannerSlider\Api\Command\Banners;

/**
 * Interface GetInterface
 * @package Geexu\BannerSlider\Api\Command\Banners
 */
interface GetInterface {

    /**
     * @param $bannersId
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute($bannersId);
}
