<?php


namespace Geexu\Blog\Controller\Author;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Geexu\Blog\Helper\Data;
use Geexu\Blog\Model\Config\Source\SideBarLR;
use Geexu\Blog\Model\ResourceModel\Author\Collection as AuthorCollection;

/**
 * Class View
 * @package Geexu\Blog\Controller\Author
 */
class Information extends Action
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
     * @var Data
     */
    protected $_helperBlog;

    /**
     * @var AuthorCollection
     */
    protected $authorCollection;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * View constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param AuthorCollection $authorCollection
     * @param Session $customerSession
     * @param Registry $coreRegistry
     * @param Data $helperData
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        AuthorCollection $authorCollection,
        Session $customerSession,
        Registry $coreRegistry,
        Data $helperData
    ) {
        $this->_helperBlog = $helperData;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->authorCollection = $authorCollection;
        $this->customerSession = $customerSession;
        $this->coreRegistry = $coreRegistry;

        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|Redirect|ResultInterface|Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $this->_helperBlog->setCustomerContextId();

        if (!$this->_helperBlog->isEnabled() || !$this->_helperBlog->isEnabledAuthor()) {
            $resultRedirect->setPath('customer/account');

            return $resultRedirect;
        }

        if (!$this->_helperBlog->isAuthor()) {
            $this->coreRegistry->register('mp_author', $this->_helperBlog->getCurrentAuthor());

            $page = $this->resultPageFactory->create();
            $page->getConfig()->setPageLayout(SideBarLR::LEFT);
            $page->getConfig()->getTitle()->set('Information Author');

            return $page;
        }

        if ($this->_helperBlog->isLogin()) {
            $resultRedirect->setPath('mpblog/*/signup');
        } else {
            $resultRedirect->setPath('customer/account');
        }

        return $resultRedirect;
    }
}
