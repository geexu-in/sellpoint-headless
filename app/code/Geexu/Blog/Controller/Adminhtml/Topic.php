<?php

namespace Geexu\Blog\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Geexu\Blog\Model\TopicFactory;

/**
 * Class Topic
 * @package Geexu\Blog\Controller\Adminhtml
 */
abstract class Topic extends Action
{
    /** Authorization level of a basic admin session */
    const ADMIN_RESOURCE = 'Geexu_Blog::topic';

    /**
     * Topic Factory
     *
     * @var TopicFactory
     */
    public $topicFactory;

    /**
     * Core registry
     *
     * @var Registry
     */
    public $coreRegistry;

    /**
     * Topic constructor.
     *
     * @param TopicFactory $topicFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        TopicFactory $topicFactory
    ) {
        $this->topicFactory = $topicFactory;
        $this->coreRegistry = $coreRegistry;

        parent::__construct($context);
    }

    /**
     * @param bool $register
     *
     * @return bool|\Geexu\Blog\Model\Topic
     */
    protected function initTopic($register = false)
    {
        $topicId = (int)$this->getRequest()->getParam('id');

        /** @var \Geexu\Blog\Model\Topic $topic */
        $topic = $this->topicFactory->create();
        if ($topicId) {
            $topic->load($topicId);
            if (!$topic->getId()) {
                $this->messageManager->addErrorMessage(__('This topic no longer exists.'));

                return false;
            }
        }

        if ($register) {
            $this->coreRegistry->register('geexu_blog_topic', $topic);
        }

        return $topic;
    }
}
