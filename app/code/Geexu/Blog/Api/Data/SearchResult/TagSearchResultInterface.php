<?php

namespace Geexu\Blog\Api\Data\SearchResult;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface TagSearchResultInterface
 * @package Geexu\Blog\Api\Data\SearchResult
 */
interface TagSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Geexu\Blog\Api\Data\TagInterface[]
     */
    public function getItems();

    /**
     * @param \Geexu\Blog\Api\Data\TagInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}
