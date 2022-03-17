<?php


namespace Geexu\Blog\Block\Html;

use Magento\Framework\View\Element\Html\Link;
use Magento\Framework\View\Element\Template\Context;
use Geexu\Blog\Helper\Data;

/**
 * Class Footer
 * @package Geexu\Blog\Block\Html
 */
class Footer extends Link
{
    /**
     * @var Data
     */
    public $helper;

    /**
     * @var string
     */
    protected $_template = 'Geexu_Blog::html\footer.phtml';

    /**
     * Footer constructor.
     *
     * @param Context $context
     * @param Data $helper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->helper->getBlogUrl('');
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        if ($this->helper->getBlogConfig('general/name') == "") {
            return __("Blog");
        }

        return $this->helper->getBlogConfig('general/name');
    }

    /**
     * @return string
     */
    public function getHtmlSiteMapUrl()
    {
        return $this->helper->getBlogUrl('sitemap');
    }
}
