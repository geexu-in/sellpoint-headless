<?php


namespace Geexu\Blog\Model\Config;

use Magento\Framework\DataObject;
use Geexu\Blog\Api\Data\Config\SeoInterface;

/**
 * Class Seo
 * @package Geexu\Blog\Model\Config
 */
class Seo extends DataObject implements SeoInterface
{
    /**
     * {@inheritdoc}
     */
    public function getMetaTitle()
    {
        return $this->getData(self::META_TITLE);
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaTitle($value)
    {
        $this->setData(self::META_TITLE, $value);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaDescription()
    {
        return $this->getData(self::META_DESCRIPTION);
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaDescription($value)
    {
        $this->setData(self::META_DESCRIPTION, $value);

        return $this;
    }
}
