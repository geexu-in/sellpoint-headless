<?php

namespace Geexu\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\LayoutFactory;
use Geexu\Blog\Controller\Adminhtml\Post;
use Geexu\Blog\Model\PostFactory;

/**
 * Class Products
 * @package Geexu\Blog\Controller\Adminhtml\Post
 */
class History extends Post
{
    /**
     * @var LayoutFactory
     */
    protected $resultLayoutFactory;

    /**
     * Products constructor.
     *
     * @param Context $context
     * @param PostFactory $productFactory
     * @param Registry $registry
     * @param LayoutFactory $resultLayoutFactory
     */
    public function __construct(
        Context $context,
        Registry $registry,
        PostFactory $productFactory,
        LayoutFactory $resultLayoutFactory
    ) {
        parent::__construct($productFactory, $registry, $context);

        $this->resultLayoutFactory = $resultLayoutFactory;
    }

    /**
     * Save action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $this->initPost(true);

        return $this->resultLayoutFactory->create();
    }
}
