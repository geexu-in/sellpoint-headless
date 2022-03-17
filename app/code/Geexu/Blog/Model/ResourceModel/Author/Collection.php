<?php


namespace Geexu\Blog\Model\ResourceModel\Author;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Geexu\Blog\Model\ResourceModel\Author
 */
class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected $_idFieldName = 'user_id';

    /**
     * Construct
     */
    protected function _construct()
    {
        $this->_init('Geexu\Blog\Model\Author', 'Geexu\Blog\Model\ResourceModel\Author');
    }
}
