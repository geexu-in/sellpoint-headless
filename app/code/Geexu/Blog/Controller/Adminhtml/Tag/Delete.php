<?php

namespace Geexu\Blog\Controller\Adminhtml\Tag;

use Exception;
use Magento\Framework\Controller\Result\Redirect;
use Geexu\Blog\Controller\Adminhtml\Tag;

/**
 * Class Delete
 * @package Mageplaza\Blog\Controller\Adminhtml\Tag
 */
class Delete extends Tag
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $this->tagFactory->create()
                    ->load($id)
                    ->delete();
                $this->messageManager->addSuccessMessage(__('The Tag has been deleted.'));
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                $resultRedirect->setPath('geexu_blog/*/edit', ['id' => $id]);

                return $resultRedirect;
            }
        } else {
            $this->messageManager->addErrorMessage(__('Tag to delete was not found.'));
        }

        $resultRedirect->setPath('geexu_blog/*/');

        return $resultRedirect;
    }
}
