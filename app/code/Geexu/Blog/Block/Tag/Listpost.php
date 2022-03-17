<?php

namespace Geexu\Blog\Block\Tag;

use Geexu\Blog\Helper\Data;
use Geexu\Blog\Model\ResourceModel\Post\Collection;
use Geexu\Blog\Model\TagFactory;

/**
 * Class Listpost
 * @package Geexu\Blog\Block\Tag
 */
class Listpost extends \Geexu\Blog\Block\Listpost
{
    /**
     * @var TagFactory
     */
    protected $_tag;

    /**
     * Override this function to apply collection for each type
     *
     * @return Collection
     */
    protected function getCollection()
    {
        if ($tag = $this->getBlogObject()) {
            return $this->helperData->getPostCollection(Data::TYPE_TAG, $tag->getId());
        }

        return null;
    }

    /**
     * @return mixed
     */
    protected function getBlogObject()
    {
        if (!$this->_tag) {
            $id = $this->getRequest()->getParam('id');

            if ($id) {
                $tag = $this->helperData->getObjectByParam($id, null, Data::TYPE_TAG);
                if ($tag && $tag->getId()) {
                    $this->_tag = $tag;
                }
            }
        }

        return $this->_tag;
    }

    /**
     * @inheritdoc
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if ($breadcrumbs = $this->getLayout()->getBlock('breadcrumbs')) {
            $tag = $this->getBlogObject();
            if ($tag) {
                $breadcrumbs->addCrumb($tag->getUrlKey(), [
                    'label' => __('Tag'),
                    'title' => __('Tag')
                ]);
            }
        }
    }

    /**
     * @param bool $meta
     *
     * @return array
     */
    public function getBlogTitle($meta = false)
    {
        $blogTitle = parent::getBlogTitle($meta);
        $tag = $this->getBlogObject();
        if (!$tag) {
            return $blogTitle;
        }

        if ($meta) {
            if ($tag->getMetaTitle()) {
                array_push($blogTitle, $tag->getMetaTitle());
            } else {
                array_push($blogTitle, ucfirst($tag->getName()));
            }

            return $blogTitle;
        }

        return ucfirst($tag->getName());
    }
}
