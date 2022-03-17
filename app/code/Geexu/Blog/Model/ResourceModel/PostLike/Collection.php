<?php


namespace Geexu\Blog\Model\ResourceModel\PostLike;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Geexu\Blog\Model\PostLike;

/**
 * Class Collection
 * @package Geexu\Blog\Model\ResourceModel\PostLike
 */
class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(PostLike::class, \Geexu\Blog\Model\ResourceModel\PostLike::class);
    }
}
