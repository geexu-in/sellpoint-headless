<?php

namespace Geexu\BannerSlider\Api\Data;

/**
 * Interface BannersSearchResultsInterface
 * @package Geexu\BannerSlider\Api\Data
 */
interface BannersSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Banners list.
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface[]
     */
    public function getItems();

    /**
     * Set banner_name list.
     * @param \Geexu\BannerSlider\Api\Data\BannersInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
