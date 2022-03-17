<?php

namespace Geexu\Blog\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Class Topic
 * @package Geexu\Blog\Block\Adminhtml
 */
class Topic extends Container
{
    /**
     * constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_topic';
        $this->_blockGroup = 'Geexu_Blog';
        $this->_headerText = __('Topics');
        $this->_addButtonLabel = __('Create New Topic');

        parent::_construct();
    }
}
