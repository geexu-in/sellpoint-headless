<?php

namespace Geexu\Blog\Block\Post;

use Geexu\Blog\Block\Frontend;
use Geexu\Blog\Helper\Data;

/**
 * Class ManagePost
 * @package Geexu\Blog\Block\Post
 */
class ManagePost extends Frontend
{
    /**
     * @return string
     */
    public function getCategoriesTree()
    {
        return Data::jsonEncode($this->categoryOptions->getCategoriesTree());
    }

    /**
     * @return string
     */
    public function getTopicTree()
    {
        return Data::jsonEncode($this->topicOptions->getTopicsCollection());
    }

    /**
     * @return string
     */
    public function getTagTree()
    {
        return Data::jsonEncode($this->tagOptions->getTagsCollection());
    }

    /**
     * @return bool
     */
    public function checkTheme()
    {
        return $this->themeProvider->getThemeById($this->helperData->getCurrentThemeId())
                ->getCode() === 'Smartwave/porto';
    }
}
