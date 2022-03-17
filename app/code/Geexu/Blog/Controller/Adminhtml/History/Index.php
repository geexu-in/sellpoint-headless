<?php

namespace Geexu\Blog\Controller\Adminhtml\History;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Index
 * @package Geexu\Blog\Controller\Adminhtml\History
 */
class Index extends Action
{

    /**
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $resultRedirect->setPath('geexu_blog/post/');

        return $resultRedirect;
    }
}
