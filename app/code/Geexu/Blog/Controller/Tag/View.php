<?php


namespace Geexu\Blog\Controller\Tag;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Geexu\Blog\Helper\Data as HelperBlog;

/**
 * Class View
 * @package Geexu\Blog\Controller\Tag
 */
class View extends Action
{
    /**
     * @var PageFactory
     */
    public $resultPageFactory;

    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var HelperBlog
     */
    public $helperBlog;

    /**
     * View constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param HelperBlog $helperBlog
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        HelperBlog $helperBlog
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->helperBlog = $helperBlog;

        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|ResultInterface|Page
     * @throws NoSuchEntityException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $tag = $this->helperBlog->getFactoryByType(HelperBlog::TYPE_TAG)->create()->load($id);

        if (!$this->helperBlog->checkStore($tag)) {
            return $this->_redirect('noroute');
        }

        $page = $this->resultPageFactory->create();
        $page->getConfig()->setPageLayout($this->helperBlog->getSidebarLayout());

        return $tag->getEnabled() ? $page : $this->_redirect('noroute');
    }
}
