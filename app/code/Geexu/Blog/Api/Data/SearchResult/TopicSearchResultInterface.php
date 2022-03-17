<?php

namespace Geexu\Blog\Api\Data\SearchResult;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface TopicSearchResultInterface
 * @package Geexu\Blog\Api\Data\SearchResult
 */
interface TopicSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Geexu\Blog\Api\Data\TopicInterface[]
     */
    public function getItems();

    /**
     * @param \Geexu\Blog\Api\Data\TopicInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}
