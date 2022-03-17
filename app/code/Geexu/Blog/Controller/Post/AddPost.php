<?php


namespace Geexu\Blog\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;

/**
 * Class AddPost
 * @package Geexu\Blog\Controller\Author
 */
class AddPost extends Action
{
    /**
     * @return ResponseInterface|Redirect|ResultInterface|Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $resultRedirect->setPath('mpblog/*/editpost');

        return $resultRedirect;
    }
}
