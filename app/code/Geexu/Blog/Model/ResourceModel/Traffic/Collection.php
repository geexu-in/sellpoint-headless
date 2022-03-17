<?php

namespace Geexu\Blog\Model\ResourceModel\Traffic;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Geexu\Blog\Model\ResourceModel\Traffic
 */
class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init('Geexu\Blog\Model\Traffic', 'Geexu\Blog\Model\ResourceModel\Traffic');
    }
}
