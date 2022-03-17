<?php
/**
 * Ecomteck
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the ecomteck.com license that is
 * available through the world-wide-web at this URL:
 * https://ecomteck.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Ecomteck
 * @package     Ecomteck_ProductSlider
 * @copyright   Copyright (c) 2019 Ecomteck (https://ecomteck.com/)
 * @license     https://ecomteck.com/LICENSE.txt
 */

namespace Ecomteck\ProductSlider\Api;

/**
 * Product Slider CRUD interface.
 * @api
 * @since 100.0.2
 */
interface SliderRepositoryInterface
{
    /**
     * Save slider.
     *
     * @param \Ecomteck\ProductSlider\Api\Data\SliderInterface $slider
     * @return \Ecomteck\ProductSlider\Api\Data\SliderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Ecomteck\ProductSlider\Api\Data\SliderInterface $slider);

    /**
     * Retrieve slider.
     *
     * @param int $sliderId
     * @return \Ecomteck\ProductSlider\Api\Data\SliderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($sliderId);

    /**
     * Retrieve sliders matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Ecomteck\ProductSlider\Api\Data\SliderSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete slider.
     *
     * @param \Ecomteck\ProductSlider\Api\Data\SliderInterface $slider
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Ecomteck\ProductSlider\Api\Data\SliderInterface $slider);

    /**
     * Delete slider by ID.
     *
     * @param int $sliderId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($sliderId);
     /**
     * Get product list by slider id
     *
     * @param string $id
     * @return string[]
     */
    public function getProductsBySliderId($sliderId);
}
