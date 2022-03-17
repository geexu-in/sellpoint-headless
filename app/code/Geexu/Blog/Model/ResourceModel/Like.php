<?php

namespace Geexu\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Like
 * @package Geexu\Blog\Model\ResourceModel
 */
class Like extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('geexu_blog_comment_like', 'like_id');
    }
}
