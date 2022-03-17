<?php


namespace Geexu\Blog\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Geexu\Blog\Model\CommentFactory;

/**
 * Class Comment
 * @package Geexu\Blog\Controller\Adminhtml
 */
abstract class Comment extends Action
{
    /** Authorization level of a basic admin session */
    const ADMIN_RESOURCE = 'Geexu_Blog::comment';

    /**
     * @var CommentFactory
     */
    public $commentFactory;

    /**
     * Core registry
     *
     * @var Registry
     */
    public $coreRegistry;

    /**
     * Comment constructor.
     *
     * @param CommentFactory $commentFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        CommentFactory $commentFactory,
        Registry $coreRegistry,
        Context $context
    ) {
        $this->commentFactory = $commentFactory;
        $this->coreRegistry = $coreRegistry;

        parent::__construct($context);
    }

    /**
     * @param bool $register
     *
     * @return bool|\Geexu\Blog\Model\Comment
     */
    protected function initComment($register = false)
    {
        $cmtId = $this->getRequest()->getParam("id");

        /** @var \Geexu\Blog\Model\Post $post */
        $comment = $this->commentFactory->create();

        if ($cmtId) {
            $comment->load($cmtId);
            if (!$comment->getId()) {
                $this->messageManager->addErrorMessage(__('This comment no longer exists.'));

                return false;
            }
        }

        if ($register) {
            $this->coreRegistry->register('geexu_blog_comment', $comment);
        }

        return $comment;
    }
}
