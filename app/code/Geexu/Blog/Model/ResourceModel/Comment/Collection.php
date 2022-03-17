<?php


namespace Geexu\Blog\Model\ResourceModel\Comment;

use Magento\Sales\Model\ResourceModel\Collection\AbstractCollection;
use Geexu\Blog\Api\Data\SearchResult\CommentSearchResultInterface;
use Geexu\Blog\Model\Comment;

/**
 * Class Collection
 * @package Geexu\Blog\Model\ResourceModel\Comment
 */
class Collection extends AbstractCollection implements CommentSearchResultInterface
{
    /**
     * @var string
     */
    protected $_idFieldName = 'comment_id';

    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(Comment::class, \Geexu\Blog\Model\ResourceModel\Comment::class);
    }
}
