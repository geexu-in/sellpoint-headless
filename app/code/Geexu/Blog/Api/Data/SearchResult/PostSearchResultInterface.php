<?php


namespace Geexu\Blog\Api\Data\SearchResult;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PostSearchResultInterface
 * @api
 */
interface PostSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Geexu\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * @param \Geexu\Blog\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}
