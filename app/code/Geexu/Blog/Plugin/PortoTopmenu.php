<?php

namespace Geexu\Blog\Plugin;

use Geexu\Blog\Block\Category\Menu;
use Geexu\Blog\Helper\Data;

/**
 * Class PortoTopmenu
 * @package Geexu\Blog\Plugin
 */
class PortoTopmenu
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
     * @param \Smartwave\Megamenu\Block\Topmenu $topmenu
     * @param $html
     *
     * @return string
     */
    public function afterGetMegamenuHtml(\Smartwave\Megamenu\Block\Topmenu $topmenu, $html)
    {
        if ($this->helper->isEnabled() && $this->helper->getBlogConfig('general/toplinks')) {
            $blogHtml = $topmenu->getLayout()->createBlock(Menu::class)
                ->setTemplate('Geexu_Blog::category/topPortoMenu.phtml')->toHtml();

            return $html . $blogHtml;
        }

        return $html;
    }
}
