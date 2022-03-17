<?php


namespace Geexu\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use Geexu\Blog\Helper\Data;

/**
 * Class PostLike
 * @package Geexu\Blog\Model
 */
class PostHistory extends AbstractModel
{
    /**
     * Cache tag
     *
     * @var string
     */
    const CACHE_TAG = 'geexu_blog_post_history';

    /**
     * Cache tag
     *
     * @var string
     */
    protected $_cacheTag = 'geexu_blog_post_history';

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'geexu_blog_post_history';

    /**
     * @var string
     */
    protected $_idFieldName = 'like_id';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\PostHistory::class);
    }

    /**
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @param $postId
     *
     * @return int
     */
    public function getSumPostHistory($postId)
    {
        return $this->getCollection()->addFieldToFilter('post_id', $postId)->count();
    }

    /**
     * @param $postId
     */
    public function removeFirstHistory($postId)
    {
        $this->getCollection()->addFieldToFilter('post_id', $postId)->getFirstItem()->delete();
    }

    /**
     * @return array|mixed
     */
    public function getProductsPosition()
    {
        if (!$this->getId()) {
            return [];
        }
        $data = [];
        foreach (Data::jsonDecode($this->getProductIds()) as $key => $value) {
            $data[$key] = $value['position'];
        }

        return $data;
    }
}
