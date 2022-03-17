<?php


namespace Geexu\Blog\Controller\Adminhtml\Comment;

use Exception;
use Magento\Framework\Controller\Result\Redirect;
use Geexu\Blog\Controller\Adminhtml\Comment;

/**
 * Class Delete
 * @package Geexu\Blog\Controller\Adminhtml\Comment
 */
class Delete extends Comment
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $this->commentFactory->create()
                    ->load($id)
                    ->delete();

                $this->messageManager->addSuccessMessage(__('The Comment has been deleted.'));
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                $resultRedirect->setPath('geexu_blog/*/edit', ['id' => $id]);

                return $resultRedirect;
            }
        } else {
            $this->messageManager->addErrorMessage(__('Comment to delete was not found.'));
        }

        $resultRedirect->setPath('geexu_blog/*/');

        return $resultRedirect;
    }
}
