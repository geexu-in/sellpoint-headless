<?php


namespace Geexu\Blog\Plugin\Customer;

use Magento\Framework\View\Element\Html\Link;
use Magento\Framework\View\Element\Html\Links;
use Geexu\Blog\Helper\Data;

/**
 * Class LinkMenu
 * @package Geexu\Blog\Plugin\Customer
 */
class LinkMenu
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
     * @param Links $subject
     * @param Link[] $links
     *
     * @return mixed
     */
    public function afterGetLinks(
        Links $subject,
        $links
    ) {
        if ($links && $this->helper->isEnabled() && !$this->helper->getConfigGeneral('customer_approve')) {
            foreach ($links as $key => $link) {
                if ($link->getPath() === 'mpblog/author/signup') {
                    $this->helper->setCustomerContextId();
                    $author = $this->helper->getCurrentAuthor();
                    if ($author === null || !$author->getId()) {
                        unset($links[$key]);
                    }
                }
            }
        }

        return $links;
    }
}
