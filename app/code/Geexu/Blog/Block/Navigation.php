<?php


namespace Geexu\Blog\Block;

use Magento\Framework\View\Element\Html\Links;

/**
 * Class Navigation
 * @package Geexu\Blog\Block
 */
class Navigation extends Links
{
    /**
     * {@inheritdoc}
     */
    public function getLinks()
    {
        $links = parent::getLinks();

        usort($links, [$this, "compare"]);

        return $links;
    }

    /**
     * @param $firstLink
     * @param $secondLink
     *
     * @return bool
     */
    private function compare($firstLink, $secondLink)
    {
        return ($firstLink->getData('sortOrder') > $secondLink->getData('sortOrder'));
    }
}
