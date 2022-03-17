<?php

namespace Geexu\Blog\Controller\Adminhtml\Author;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Layout;
use Magento\Framework\View\Result\LayoutFactory;
use Geexu\Blog\Controller\Adminhtml\Author;
use Geexu\Blog\Model\AuthorFactory;

/**
 * Class Posts
 * @package Geexu\Blog\Controller\Adminhtml\Tag
 */
class Posts extends Author
{
    /**
     * @var LayoutFactory
     */
    public $resultLayoutFactory;

    /**
     * Posts constructor.
     *
     * @param Context $context
     * @param Registry $coreRegistry
     * @param LayoutFactory $resultLayoutFactory
     * @param AuthorFactory $authorFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        LayoutFactory $resultLayoutFactory,
        AuthorFactory $authorFactory
    ) {
        $this->resultLayoutFactory = $resultLayoutFactory;

        parent::__construct($context, $coreRegistry, $authorFactory);
    }

    /**
     * @return Layout
     */
    public function execute()
    {
        $this->initAuthor(true);

        return $this->resultLayoutFactory->create();
    }
}
