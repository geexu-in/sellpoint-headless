<?php


namespace Geexu\Blog\Model;

use Magento\Framework\DataObject;
use Geexu\Blog\Api\Data\BlogConfigInterface;


/**
 * Class BlogConfig
 * @package Geexu\Blog\Model
 */
class BlogConfig extends DataObject implements BlogConfigInterface
{

    /**
     * {@inheritdoc}
     */
    public function getGeneral()
    {
        return $this->getData(self::GENERAL);
    }

    /**
     * {@inheritdoc}
     */
    public function setGeneral($value)
    {
        $this->setData(self::GENERAL, $value);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSidebar()
    {
        return $this->getData(self::SIDEBAR);
    }

    /**
     * {@inheritdoc}
     */
    public function setSidebar($value)
    {
        $this->setData(self::SIDEBAR, $value);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSeo()
    {
        return $this->getData(self::SEO);
    }

    /**
     * {@inheritdoc}
     */
    public function setSeo($value)
    {
        $this->setData(self::SEO, $value);

        return $this;
    }
}
