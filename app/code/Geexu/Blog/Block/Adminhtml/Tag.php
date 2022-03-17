<?php

namespace Geexu\Blog\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

/**
 * Class Tag
 * @package Geexu\Blog\Block\Adminhtml
 */
class Tag extends Container
{
    /**
     * constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_tag';
        $this->_blockGroup = 'Geexu_Blog';
        $this->_headerText = __('Tags');
        $this->_addButtonLabel = __('Create New Tag');

        parent::_construct();
    }
}
