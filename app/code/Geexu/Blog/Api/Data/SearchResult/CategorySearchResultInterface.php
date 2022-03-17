<?php

namespace Geexu\Blog\Api\Data\SearchResult;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CategorySearchResultInterface
 * @package Geexu\Blog\Api\Data\SearchResult
 */
interface CategorySearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Geexu\Blog\Api\Data\CategoryInterface[]
     */
    public function getItems();

    /**
     * @param \Geexu\Blog\Api\Data\CategoryInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}
