<?php


namespace Geexu\Blog\Model\ResourceModel\Like;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Geexu\Blog\Model\ResourceModel\Like
 */
class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init('Geexu\Blog\Model\Like', 'Geexu\Blog\Model\ResourceModel\Like');
    }
}
