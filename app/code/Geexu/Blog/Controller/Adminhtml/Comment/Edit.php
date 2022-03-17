<?php


namespace Geexu\Blog\Controller\Adminhtml\Comment;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Geexu\Blog\Controller\Adminhtml\Comment;
use Geexu\Blog\Model\CommentFactory;

/**
 * Class Edit
 * @package Geexu\Blog\Controller\Adminhtml\Comment
 */
class Edit extends Comment
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
     * @param PageFactory $pageFactory
     * @param CommentFactory $commentFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        PageFactory $pageFactory,
        CommentFactory $commentFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->resultPageFactory = $pageFactory;

        parent::__construct($commentFactory, $coreRegistry, $context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|Redirect|Page
     */
    public function execute()
    {
        /** @var \Geexu\Blog\Model\Comment $comment */
        $comment = $this->initComment();

        if (!$comment) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*');

            return $resultRedirect;
        }

        $data = $this->_session->getData('geexu_blog_comment_data', true);

        if (!empty($data)) {
            $comment->setData($data);
        }

        $this->coreRegistry->register('geexu_blog_comment', $comment);

        /** @var \Magento\Backend\Model\View\Result\Page|Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Geexu_Blog::comment');

        $title = __('Edit Comment');
        $resultPage->getConfig()->getTitle()->prepend($title);

        return $resultPage;
    }
}
