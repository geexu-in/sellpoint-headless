<?php

namespace Geexu\Blog\Plugin;

use Magento\Framework\Exception\LocalizedException;
use Geexu\Blog\Block\Category\Menu;
use Geexu\Blog\Helper\Data;

/**
 * Class Topmenu
 * @package Geexu\Blog\Plugin
 */
class Topmenu
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * Topmenu constructor.
     *
     * @param Data $helper
     */
    public function __construct(
        Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @param \Magento\Theme\Block\Html\Topmenu $subject
     * @param $html
     *
     * @return string
     * @throws LocalizedException
     */
    public function afterGetHtml(
        \Magento\Theme\Block\Html\Topmenu $subject,
        $html
    ) {
        if ($this->helper->isEnabled() && $this->helper->getBlogConfig('general/toplinks')) {
            $blogHtml = $subject->getLayout()->createBlock(Menu::class)
                ->setTemplate('Geexu_Blog::category/topmenu.phtml')->toHtml();

            return $html . $blogHtml;
        }

        return $html;
    }
}
