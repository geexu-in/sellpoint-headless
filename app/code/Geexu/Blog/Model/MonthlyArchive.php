<?php

namespace Geexu\Blog\Model;

use Magento\Framework\DataObject;
use Geexu\Blog\Api\Data\MonthlyArchiveInterface;


/**
 * Class MonthlyArchive
 * @package Geexu\Blog\Model
 */
class MonthlyArchive extends DataObject implements MonthlyArchiveInterface
{
    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return $this->getData(self::LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setLabel($value)
    {
        $this->setData(self::LABEL, $value);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostCount()
    {
        return $this->getData(self::POST_COUNT);
    }

    /**
     * {@inheritdoc}
     */
    public function setPostCount($value)
    {
        $this->setData(self::POST_COUNT, $value);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    /**
     * {@inheritdoc}
     */
    public function setLink($value)
    {
        $this->setData(self::LINK, $value);

        return $this;
    }
}
