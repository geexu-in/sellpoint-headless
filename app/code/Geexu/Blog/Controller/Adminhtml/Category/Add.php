<?php

namespace Geexu\Blog\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Forward;
use Magento\Backend\Model\View\Result\ForwardFactory;

/**
 * Class Add
 * @package Geexu\Blog\Controller\Adminhtml\Category
 */
class Add extends Action
{
    /**
     * Redirect result factory
     *
     * @var ForwardFactory
     */
    public $resultForwardFactory;

    /**
     * NewAction constructor.
     *
     * @param Context $context
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;

        parent::__construct($context);
    }

    /**
     * forward to edit
     *
     * @return Forward
     */
    public function execute()
    {
        $this->_getSession()->unsGeexuBlogCategoryActiveTabId();

        $resultForward = $this->resultForwardFactory->create();
        $resultForward->forward('edit');

        return $resultForward;
    }
}
