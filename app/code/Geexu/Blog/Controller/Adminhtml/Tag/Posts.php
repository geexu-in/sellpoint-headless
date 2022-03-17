<?php

namespace Geexu\Blog\Controller\Adminhtml\Tag;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Layout;
use Magento\Framework\View\Result\LayoutFactory;
use Geexu\Blog\Controller\Adminhtml\Tag;
use Geexu\Blog\Model\TagFactory;

/**
 * Class Posts
 * @package Geexu\Blog\Controller\Adminhtml\Tag
 */
class Posts extends Tag
{
    /**
     * @var LayoutFactory
     */
    public $resultLayoutFactory;

    /**
     * Posts constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param LayoutFactory $resultLayoutFactory
     * @param TagFactory $postFactory
     */
    public function __construct(
        Context $context,
        Registry $registry,
        LayoutFactory $resultLayoutFactory,
        TagFactory $postFactory
    ) {
        $this->resultLayoutFactory = $resultLayoutFactory;

        parent::__construct($context, $registry, $postFactory);
    }

    /**
     * @return Layout
     */
    public function execute()
    {
        $this->initTag(true);

        return $this->resultLayoutFactory->create();
    }
}
