<?php


namespace Geexu\Blog\Api\Data\SearchResult;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CommentSearchResultInterface
 * @api
 */
interface CommentSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Geexu\Blog\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * @param \Geexu\Blog\Api\Data\CommentInterface[] $items
     * @return $this
     */
    public function setItems(array $items = null);
}
