<?php


namespace Geexu\Blog\Block\Sidebar;

use Magento\Framework\Exception\NoSuchEntityException;
use Geexu\Blog\Block\Frontend;
use Geexu\Blog\Helper\Data;

/**
 * Class Search
 * @package Geexu\Blog\Block\Sidebar
 */
class Search extends Frontend
{
    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getSearchBlogData()
    {
        $result = [];
        $posts = $this->helperData->getPostList();
        $limitDesc = (int)$this->getSidebarConfig('search/description');
        if (!empty($posts)) {
            foreach ($posts as $item) {
                $shortDescription = ($item->getShortDescription() && $limitDesc > 0) ?
                    $item->getShortDescription() : '';
                if (strlen($shortDescription) > $limitDesc) {
                    $shortDescription = mb_substr($shortDescription, 0, $limitDesc, 'UTF-8') . '...';
                }

                $result[] = [
                    'value' => $item->getName(),
                    'url' => $item->getUrl(),
                    'image' => $this->resizeImage($item->getImage(), '100x'),
                    'desc' => $shortDescription
                ];
            }
        }

        return Data::jsonEncode($result);
    }

    /**
     * get sidebar config
     *
     * @param $code
     * @param $storeId
     *
     * @return mixed
     */
    public function getSidebarConfig($code, $storeId = null)
    {
        return $this->helperData->getBlogConfig('sidebar/' . $code, $storeId);
    }
}
