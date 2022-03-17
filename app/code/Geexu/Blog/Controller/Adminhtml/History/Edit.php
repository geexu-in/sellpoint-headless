<?php

namespace Geexu\Blog\Controller\Adminhtml\History;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Geexu\Blog\Controller\Adminhtml\History;
use Geexu\Blog\Model\PostFactory;
use Geexu\Blog\Model\PostHistory;
use Geexu\Blog\Model\PostHistoryFactory;

/**
 * Class Edit
 * @package Geexu\Blog\Controller\Adminhtml\History
 */
class Edit extends History
{
    /**
     * Page factory
     *
     * @var PageFactory
     */
    public $resultPageFactory;

    /**
     * Edit constructor.
     *
     * @param PostHistoryFactory $postHistoryFactory
     * @param PostFactory $postFactory
     * @param Registry $coreRegistry
     * @param DateTime $date
     * @param PageFactory $resultPageFactory
     * @param Context $context
     */
    public function __construct(
        PostHistoryFactory $postHistoryFactory,
        PostFactory $postFactory,
        Registry $coreRegistry,
        DateTime $date,
        PageFactory $resultPageFactory,
        Context $context
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($postHistoryFactory, $postFactory, $coreRegistry, $date, $context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|Redirect|Page
     */
    public function execute()
    {
        /** @var PostHistory $history */
        $history = $this->initPostHistory();

        if (!$history) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*');

            return $resultRedirect;
        }

        $this->coreRegistry->register('geexu_blog_post', $history);

        /** @var \Magento\Backend\Model\View\Result\Page|Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Geexu_Blog::history');
        $resultPage->getConfig()->getTitle()->set(__('Post History'));

        $resultPage->getConfig()->getTitle()->prepend(__('Edit Post History'));

        return $resultPage;
    }
}
