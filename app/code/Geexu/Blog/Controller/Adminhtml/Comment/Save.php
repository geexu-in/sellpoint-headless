<?php


namespace Geexu\Blog\Controller\Adminhtml\Comment;

use Exception;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Geexu\Blog\Controller\Adminhtml\Comment;
use Geexu\Blog\Model\CommentFactory;
use RuntimeException;

/**
 * Class Save
 * @package Geexu\Blog\Controller\Adminhtml\Comment
 */
class Save extends Comment
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data = $this->getRequest()->getPost('comment')) {
            /** @var \Geexu\Blog\Model\Comment $post */
            $comment = $this->initComment();

            $this->prepareData($comment, $data);

            $this->_eventManager->dispatch(
                'geexu_blog_comment_prepare_save',
                ['comment' => $comment, 'request' => $this->getRequest()]
            );

            try {
                $comment->save();

                $this->messageManager->addSuccessMessage(__('The comment has been saved.'));
                $this->_getSession()->setData('geexu_blog_comment_data', false);

                if ($this->getRequest()->getParam('back')) {
                    $resultRedirect->setPath('geexu_blog/*/edit', ['id' => $comment->getId(), '_current' => true]);
                } else {
                    $resultRedirect->setPath('geexu_blog/*/');
                }

                return $resultRedirect;
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (RuntimeException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Comment.'));
            }

            $this->_getSession()->setData('geexu_blog_comment_data', $data);

            $resultRedirect->setPath('geexu_blog/*/edit', ['id' => $comment->getId(), '_current' => true]);

            return $resultRedirect;
        }

        $resultRedirect->setPath('geexu_blog/*/');

        return $resultRedirect;
    }

    /**
     * @param $comment
     * @param array $data
     *
     * @return $this
     */
    protected function prepareData($comment, $data = [])
    {
        $comment->addData($data);

        return $this;
    }
}
