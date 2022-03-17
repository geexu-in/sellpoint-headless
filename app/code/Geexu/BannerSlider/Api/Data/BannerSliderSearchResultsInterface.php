<?php
namespace Geexu\BannerSlider\Api\Data;

/**
 * Interface BannerSliderSearchResultsInterface
 * @package Geexu\BannerSlider\Api\Data
 */
interface BannerSliderSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get BannerSlider list.
     * @return \Geexu\BannerSlider\Api\Data\BannerSliderInterface[]
     */
    public function getItems();

    /**
     * Set slider_name list.
     * @param \Geexu\BannerSlider\Api\Data\BannerSliderInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
