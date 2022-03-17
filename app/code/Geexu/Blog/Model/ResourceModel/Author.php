<?php


namespace Geexu\Blog\Model\ResourceModel;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Geexu\Blog\Helper\Data;

/**
 * Class Author
 * @package Geexu\Blog\Model\ResourceModel
 */
class Author extends AbstractDb
{
    /**
     * @var Data
     */
    public $helperData;

    /**
     * @var DateTime
     */
    public $dateTime;

    /**
     * @var string
     */
    public $postTable;

    /**
     * Author constructor.
     *
     * @param Context $context
     * @param Data $helperData
     * @param DateTime $dateTime
     */
    public function __construct(
        Context $context,
        Data $helperData,
        DateTime $dateTime
    ) {
        $this->helperData = $helperData;
        $this->dateTime = $dateTime;

        parent::__construct($context);
        $this->postTable = $this->getTable('geexu_blog_post');
    }

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('geexu_blog_author', 'user_id');
    }

    /**
     * @inheritdoc
     * @throws LocalizedException
     */
    protected function _beforeSave(AbstractModel $object)
    {
        $object->setUrlKey(
            $this->helperData->generateUrlKey($this, $object, $object->getUrlKey() ?: $object->getName())
        );

        if (!$object->isObjectNew()) {
            $timeStamp = $this->dateTime->gmtDate();
            $object->setUpdatedAt($timeStamp);
        }

        return $this;
    }

    /**
     * @param \Geexu\Blog\Model\Author $author
     *
     * @return array
     */
    public function getPostIds(\Geexu\Blog\Model\Author $author)
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()->from(
            $this->postTable,
            'post_id'
        )
            ->where(
                'author_id = ?',
                (int)$author->getId()
            );

        return $adapter->fetchCol($select);
    }
}
