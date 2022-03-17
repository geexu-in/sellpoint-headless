<?php

namespace Geexu\Blog\Block\Tag;

use Geexu\Blog\Block\Frontend;
use Geexu\Blog\Helper\Data;
use Geexu\Blog\Model\ResourceModel\Post\Collection;

/**
 * Class Widget
 * @package Geexu\Blog\Block\Tag
 */
class Widget extends Frontend
{
    /**
     * @var \Geexu\Blog\Model\ResourceModel\Tag\Collection
     */
    protected $_tagList;

    /**
     * @return array|string
     */
    public function getTagList()
    {
        if (!$this->_tagList) {
            $this->_tagList = $this->helperData->getObjectList(Data::TYPE_TAG);
        }

        return $this->_tagList;
    }

    /**
     * @param $tag
     *
     * @return string
     */
    public function getTagUrl($tag)
    {
        return $this->helperData->getBlogUrl($tag, Data::TYPE_TAG);
    }

    /**
     * get tags size based on num of post
     *
     * @param $tag
     *
     * @return float|string
     */
    public function getTagSize($tag)
    {
        /** @var Collection $postList */
        $postList = $this->helperData->getPostList();
        if ($postList && ($max = $postList->getSize()) > 1) {
            $maxSize = 22;
            $tagPost = $this->helperData->getPostCollection(Data::TYPE_TAG, $tag->getId());
            if ($tagPost && ($countTagPost = $tagPost->getSize()) > 1) {
                $size = $maxSize * $countTagPost / $max;

                return round($size) + 8;
            }
        }

        return 8;
    }
}
