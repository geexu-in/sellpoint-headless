<?php

namespace Geexu\Blog\Controller\Post;

use InvalidArgumentException;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Exception\RuntimeException;
use Magento\Rss\Controller\Feed;

/**
 * Class Rss
 * @package Geexu\Blog\Controller\Post
 */
class Rss extends Feed
{
    /**
     * @return ResponseInterface|ResultInterface|void
     * @throws NotFoundException
     * @throws InputException
     * @throws RuntimeException
     */
    public function execute()
    {
        $type = 'blog_posts';
        try {
            $provider = $this->rssManager->getProvider($type);
        } catch (InvalidArgumentException $e) {
            throw new NotFoundException(__($e->getMessage()));
        }

        if ($provider->isAuthRequired() && !$this->auth()) {
            return;
        }

        /** @var $rss \Magento\Rss\Model\Rss */
        $rss = $this->rssFactory->create();
        $rss->setDataProvider($provider);

        $this->getResponse()->setHeader('Content-type', 'text/xml; charset=UTF-8');
        $this->getResponse()->setBody($rss->createRssXml());
    }
}
