<?php


namespace Geexu\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class PostLike
 * @package Geexu\Blog\Model\ResourceModel
 */
class PostLike extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('geexu_blog_post_like', 'like_id');
    }
}
