<?php

namespace Geexu\Cmsblockapi\Api;

/**
 * cms block CRUD interface.
 * @api
 * @since 100.0.2
 */
interface SliderRepositoryInterface
{
    /**
     * Get block list by block id
     *
     * @param string $id
     * @return string[]
     */
    public function getblockdata($blockid);
    /**
     * Get page list by page url
     *
     * @param string $url
     * @return string[]
     */
    public function getcmspagedata($urlKey);
     /**
     * Get order data list by customer id
     *
     * @param string $id
     * @return string[]
     */
    public function getId($customerid);
    /**
     * Get order data list by customer id
     *
     * @param string $id
     * @return string[]
     */
    public function getProductsbyCategoryUrl($categoryurl);
    /**
     * Get order data list by product sku
     *
     * @param string $id
     * @return string[]
     */
    public function getProductSalableQty($sku);
    /**
     * Get order data list by product sku
     *
     * @param string $id
     * @return string[]
     */
    public function getProductDiscount($sku);
    /**
     * Get order data list by product sizechart
     *
     * @param string $name
     * @return string[]
     */
    public function getSizechart();
}
