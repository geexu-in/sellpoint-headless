<?php


namespace Geexu\Blog\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Geexu\Blog\Model\PostFactory;
use Geexu\Blog\Model\PostHistory;
use Geexu\Blog\Model\PostHistoryFactory;

/**
 * Class Post
 * @package Geexu\Blog\Controller\Adminhtml
 */
abstract class History extends Action
{
    /** Authorization level of a basic admin session */
    const ADMIN_RESOURCE = 'Geexu_Blog::post';

    /**
     * Post History Factory
     *
     * @var PostHistoryFactory
     */
    public $postHistoryFactory;

    /**
     * Core registry
     *
     * @var Registry
     */
    public $coreRegistry;

    /**
     * @var PostFactory
     */
    protected $postFactory;

    /**
     * @var DateTime
     */
    protected $date;

    /**
     * Post constructor.
     *
     * @param PostHistoryFactory $postHistoryFactory
     * @param PostFactory $postFactory
     * @param Registry $coreRegistry
     * @param DateTime $date
     * @param Context $context
     */
    public function __construct(
        PostHistoryFactory $postHistoryFactory,
        PostFactory $postFactory,
        Registry $coreRegistry,
        DateTime $date,
        Context $context
    ) {
        $this->postHistoryFactory = $postHistoryFactory;
        $this->postFactory = $postFactory;
        $this->coreRegistry = $coreRegistry;
        $this->date = $date;

        parent::__construct($context);
    }

    /**
     * @param bool $register
     *
     * @return bool|PostHistory
     */
    protected function initPostHistory($register = false)
    {
        $historyId = (int)$this->getRequest()->getParam('id');

        /** @var \Geexu\Blog\Model\Post $post */
        $history = $this->postHistoryFactory->create();
        if ($historyId) {
            $history->load($historyId);
            if (!$history->getId()) {
                $this->messageManager->addErrorMessage(__('This History no longer exists.'));

                return false;
            }
        }

        if ($register) {
            $this->coreRegistry->register('geexu_blog_post_history', $history);
        }

        return $history;
    }
}
