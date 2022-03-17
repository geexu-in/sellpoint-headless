<?php


namespace Geexu\Blog\Plugin;

use Infortis\UltraMegamenu\Block\Navigation;
use Geexu\Blog\Block\Category\Menu;
use Geexu\Blog\Helper\Data;

/**
 * Class InfortisTopmenu
 * @package Geexu\Blog\Plugin
 */
class InfortisTopmenu
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * PortoTopmenu constructor.
     *
     * @param Data $helper
     */
    public function __construct(
        Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @param Navigation $topmenu
     * @param $html
     *
     * @return string
     */
    public function afterRenderCategoriesMenuHtml(Navigation $topmenu, $html)
    {
        if ($this->helper->isEnabled() && $this->helper->getBlogConfig('general/toplinks')) {
            $blogHtml = $topmenu->getLayout()->createBlock(Menu::class)
                ->setTemplate('Geexu_Blog::category/topmenu.phtml')->toHtml();

            return $html . $blogHtml;
        }

        return $html;
    }
}
