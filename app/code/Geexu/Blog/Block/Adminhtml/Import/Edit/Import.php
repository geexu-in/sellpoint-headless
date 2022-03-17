<?php


namespace Geexu\Blog\Block\Adminhtml\Import\Edit;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Messages;
use Geexu\Blog\Helper\Data as BlogHelper;
use Geexu\Blog\Model\Config\Source\Import\Type;

/**
 * Class Import
 * @package Geexu\Blog\Block\Adminhtml\Import\Edit
 */
class Import extends Template
{
    /**
     * @var BlogHelper
     */
    public $blogHelper;

    /**
     * @var Type
     */
    public $importType;

    /**
     * Before constructor.
     *
     * @param Context $context
     * @param BlogHelper $blogHelper
     * @param Type $importType
     * @param array $data
     */
    public function __construct(
        Context $context,
        BlogHelper $blogHelper,
        Type $importType,
        array $data = []
    ) {
        $this->blogHelper = $blogHelper;
        $this->importType = $importType;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getTypeSelector()
    {
        $types = [];
        foreach ($this->importType->toOptionArray() as $item) {
            $types[] = $item['value'];
        }
        array_shift($types);

        return BlogHelper::jsonEncode($types);
    }

    /**
     * @param $priority
     * @param $message
     *
     * @return string
     */
    public function getMessagesHtml($priority, $message)
    {
        /** @var $messagesBlock Messages */
        $messagesBlock = $this->_layout->createBlock(Messages::class);
        $messagesBlock->{$priority}(__($message));

        return $messagesBlock->toHtml();
    }

    /**
     * @return string
     */
    public function getImportButtonHtml()
    {
        $importUrl = $this->getUrl('geexu_blog/import/import');
        $html = '&nbsp;&nbsp;<button id="word-press-import" href="' . $importUrl .
            '" class="" type="button" onclick="mpBlogImport.importAction();">' .
            '<span><span><span>Import</span></span></span></button>';

        return $html;
    }
}
