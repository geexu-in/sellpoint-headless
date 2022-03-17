<?php

namespace Geexu\BannerSlider\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface BannersRepositoryInterface
 * @package Geexu\BannerSlider\Api
 */
interface BannersRepositoryInterface
{

    /**
     * Save Banners
     * @param \Geexu\BannerSlider\Api\Data\BannersInterface $banners
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Geexu\BannerSlider\Api\Data\BannersInterface $banners
    );

    /**
     * Retrieve Banners
     * @param string $bannersId
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($bannersId);

    /**
     * Retrieve Banners matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Geexu\BannerSlider\Api\Data\BannersSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Banners
     * @param \Geexu\BannerSlider\Api\Data\BannersInterface $banners
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Geexu\BannerSlider\Api\Data\BannersInterface $banners
    );

    /**
     * Delete Banners by ID
     * @param string $bannersId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bannersId);
}
