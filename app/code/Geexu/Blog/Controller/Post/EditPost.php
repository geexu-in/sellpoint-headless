<?php


namespace Geexu\Blog\Controller\Post;

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
use Geexu\Blog\Model\ResourceModel\Author\Collection as AuthorCollection;

/**
 * Class EditPost
 * @package Geexu\Blog\Controller\Author
 */
class EditPost extends Action
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

        if (!$this->_helperBlog->isAuthor()
            && $this->_helperBlog->isLogin()
            && $this->getRequest()->isAjax()
        ) {
            $page = $this->resultPageFactory->create();
            if ($this->getRequest()->getParam('postId')) {
                $author = $this->_helperBlog->getCurrentAuthor();

                $this->coreRegistry->register('mp_author', $author);

                $page->getConfig()->getTitle()->set($author->getName());
            }
            $page->getConfig()->setPageLayout('1column');
            $this->_view->loadLayout();
            $layout = $this->_view->getLayout();
            $this->getResponse()->setBody($layout->renderElement('main.content'));

            return $page;
        } else {
            $resultRedirect->setPath('customer/account');

            return $resultRedirect;
        }
    }
}
