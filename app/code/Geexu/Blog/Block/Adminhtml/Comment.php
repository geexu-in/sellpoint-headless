<?php


namespace Geexu\Blog\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Class Comment
 * @package Geexu\Blog\Block\Adminhtml
 */
class Comment extends Container
{
    /**
     * constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_comment';
        $this->_blockGroup = 'Geexu_Blog';
        $this->_addButtonLabel = __('New Comment');

        parent::_construct();
    }
}
