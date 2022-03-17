<?php

namespace Geexu\Blog\Block\Author;

use Geexu\Blog\Block\Frontend;
use Geexu\Blog\Helper\Data;

/**
 * Class Widget
 * @package Geexu\Blog\Block\Author
 */
class Widget extends Frontend
{
    /**
     * @return mixed
     */
    public function getCurrentAuthor()
    {
        $authorId = $this->getRequest()->getParam('id');
        if ($authorId) {
            $author = $this->helperData->getObjectByParam($authorId, null, Data::TYPE_AUTHOR);
            if ($author && $author->getId()) {
                return $author;
            }
        }

        return null;
    }
}
