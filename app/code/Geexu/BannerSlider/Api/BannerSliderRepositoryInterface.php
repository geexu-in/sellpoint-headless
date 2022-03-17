<?php

namespace Geexu\BannerSlider\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface BannerSliderRepositoryInterface
 * @package Geexu\BannerSlider\Api
 */
interface BannerSliderRepositoryInterface
{

    /**
     * Save BannerSlider
     * @param \Geexu\BannerSlider\Api\Data\BannerSliderInterface $bannerSlider
     * @return \Geexu\BannerSlider\Api\Data\BannerSliderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Geexu\BannerSlider\Api\Data\BannerSliderInterface $bannerSlider
    );

    /**
     * Retrieve BannerSlider
     * @param string $bannersliderId
     * @return \Geexu\BannerSlider\Api\Data\BannerSliderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($bannersliderId);

    /**
     * Retrieve BannerSlider matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Geexu\BannerSlider\Api\Data\BannerSliderSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete BannerSlider
     * @param \Geexu\BannerSlider\Api\Data\BannerSliderInterface $bannerSlider
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Geexu\BannerSlider\Api\Data\BannerSliderInterface $bannerSlider
    );

    /**
     * Delete BannerSlider by ID
     * @param string $bannersliderId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bannersliderId);
}
