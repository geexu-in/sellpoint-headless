<?php


namespace Geexu\Blog\Model;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\NoSuchEntityException;
use Geexu\Blog\Helper\Data;
use Geexu\Blog\Helper\Image;

/**
 * Class Sitemap
 * @package Geexu\Blog\Model
 */
class Sitemap extends \Magento\Sitemap\Model\Sitemap
{
    /**
     * @var Data
     */
    protected $blogDataHelper;

    /**
     * @var Image
     */
    protected $imageHelper;

    /**
     * @var mixed
     */
    protected $router;

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();

        $this->blogDataHelper = ObjectManager::getInstance()->get(Data::class);
        $this->imageHelper    = ObjectManager::getInstance()->get(Image::class);
        $this->router         = $this->blogDataHelper->getBlogConfig('general/url_prefix');
    }

    /**
     * @return array
     * @throws NoSuchEntityException
     */
    public function getBlogPostsSiteMapCollection()
    {
        $urlSuffix             = $this->blogDataHelper->getUrlSuffix();
        $postCollection        = $this->blogDataHelper->postFactory->create()->getCollection();
        $postSiteMapCollection = [];
        if (!$this->router) {
            $this->router = 'blog';
        }
        foreach ($postCollection as $item) {
            if ($item->getEnabled() !== null) {
                $images = null;
                if ($item->getImage()) {
                    $imageFile = $this->imageHelper->getMediaPath($item->getImage(), Image::TEMPLATE_MEDIA_TYPE_POST);

                    $imagesCollection[] = new DataObject([
                        'url'     => $this->imageHelper->getMediaUrl($imageFile),
                        'caption' => null,
                    ]);
                    $images             = new DataObject(['collection' => $imagesCollection]);
                }
                $postSiteMapCollection[$item->getId()] = new DataObject([
                    'id'         => $item->getId(),
                    'url'        => $this->router . '/post/' . $item->getUrlKey() . $urlSuffix,
                    'images'     => $images,
                    'updated_at' => $item->getUpdatedAt(),
                ]);
            }
        }

        return $postSiteMapCollection;
    }

    /**
     * @return array
     */
    public function getBlogCategoriesSiteMapCollection()
    {
        $urlSuffix                 = $this->blogDataHelper->getUrlSuffix();
        $categoryCollection        = $this->blogDataHelper->categoryFactory->create()->getCollection();
        $categorySiteMapCollection = [];
        foreach ($categoryCollection as $item) {
            if ($item->getEnabled() !== null) {
                $categorySiteMapCollection[$item->getId()] = new DataObject([
                    'id'         => $item->getId(),
                    'url'        => $this->router . '/category/' . $item->getUrlKey() . $urlSuffix,
                    'updated_at' => $item->getUpdatedAt(),
                ]);
            }
        }

        return $categorySiteMapCollection;
    }

    /**
     * @return array
     */
    public function getBlogTagsSiteMapCollection()
    {
        $urlSuffix            = $this->blogDataHelper->getUrlSuffix();
        $tagCollection        = $this->blogDataHelper->tagFactory->create()->getCollection();
        $tagSiteMapCollection = [];
        foreach ($tagCollection as $item) {
            if ($item->getEnabled() !== null) {
                $tagSiteMapCollection[$item->getId()] = new DataObject([
                    'id'         => $item->getId(),
                    'url'        => $this->router . '/tag/' . $item->getUrlKey() . $urlSuffix,
                    'updated_at' => $item->getUpdatedAt(),
                ]);
            }
        }

        return $tagSiteMapCollection;
    }

    /**
     * @return array
     */
    public function getBlogTopicsSiteMapCollection()
    {
        $urlSuffix              = $this->blogDataHelper->getUrlSuffix();
        $topicCollection        = $this->blogDataHelper->topicFactory->create()->getCollection();
        $topicSiteMapCollection = [];
        foreach ($topicCollection as $item) {
            if ($item->getEnabled() !== null) {
                $topicSiteMapCollection[$item->getId()] = new DataObject([
                    'id'         => $item->getId(),
                    'url'        => $this->router . '/topic/' . $item->getUrlKey() . $urlSuffix,
                    'updated_at' => $item->getUpdatedAt(),
                ]);
            }
        }

        return $topicSiteMapCollection;
    }

    /**
     * @inheritdoc
     */
    public function _initSitemapItems()
    {
        $this->_sitemapItems[] = new DataObject([
            'collection' => $this->getBlogPostsSiteMapCollection(),
        ]);
        $this->_sitemapItems[] = new DataObject([
            'collection' => $this->getBlogCategoriesSiteMapCollection(),
        ]);
        $this->_sitemapItems[] = new DataObject([
            'collection' => $this->getBlogTagsSiteMapCollection(),
        ]);
        $this->_sitemapItems[] = new DataObject([
            'collection' => $this->getBlogTopicsSiteMapCollection(),
        ]);

        parent::_initSitemapItems(); // TODO: Change the autogenerated stub
    }
}
