<?php

namespace Geexu\Blog\Controller\Adminhtml\Post;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Geexu\Blog\Controller\Adminhtml\Post;
use Geexu\Blog\Model\PostFactory;

/**
 * Class Edit
 * @package Geexu\Blog\Controller\Adminhtml\Post
 */
class Edit extends Post
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
     * @param Context $context
     * @param Registry $registry
     * @param PostFactory $postFactory
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        Registry $registry,
        PostFactory $postFactory,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;

        parent::__construct($postFactory, $registry, $context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|Redirect|Page
     */
    public function execute()
    {
        /** @var \Geexu\Blog\Model\Post $post */
        $post = $this->initPost();
        $duplicate = $this->getRequest()->getParam('duplicate');

        if (!$post) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*');

            return $resultRedirect;
        }

        $data = $this->_session->getData('geexu_blog_post_data', true);
        if (!empty($data)) {
            $post->setData($data);
        }

        $this->coreRegistry->register('geexu_blog_post', $post);

        /** @var \Magento\Backend\Model\View\Result\Page|Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('geexu_Blog::post');
        $resultPage->getConfig()->getTitle()->set(__('Posts'));

        $title = $post->getId() && !$duplicate ? $post->getName() : __('New Post');
        $resultPage->getConfig()->getTitle()->prepend($title);

        return $resultPage;
    }
}
