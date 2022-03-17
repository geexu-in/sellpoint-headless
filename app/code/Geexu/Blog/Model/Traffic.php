<?php

namespace Geexu\Blog\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Class Traffic
 * @package Geexu\Blog\Model
 */
class Traffic extends AbstractModel
{
    /**
     * Define resource model
     */
    public function _construct()
    {
        $this->_init(ResourceModel\Traffic::class);
    }
}
