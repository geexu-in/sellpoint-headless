<?php


namespace Geexu\Core\Block\Adminhtml\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Module\PackageInfoFactory;
use Geexu\Core\Helper\Validate;

/**
 * Class Docs
 * @package Geexu\Core\Block\Adminhtml\System\Config
 */
class Docs extends Field
{
    /**
     * @var Validate
     */
    protected $helper;

    /**
     * @var PackageInfoFactory
     */
    protected $_packageInfoFactory;

    /**
     * Docs constructor.
     *
     * @param Context $context
     * @param Validate $helper
     * @param PackageInfoFactory $packageInfoFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Validate $helper,
        PackageInfoFactory $packageInfoFactory,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->_packageInfoFactory = $packageInfoFactory;

        parent::__construct($context, $data);
    }

    /**
     * Render text
     *
     * @param AbstractElement $element
     *
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $html = '<td colspan="3" id="geexu-module-docs-id">
                    <div id="geexu-module-docs" class="geexu-module-messages">
                        <div class="messages">
                            <div class="message message-info">
                                <div data-ui-id="messages-message-info">
                                <ul style="margin: 0 0 0 2em;">
                                    <li><a href="' . $this->getUrlByType($element) . '" target="_blank">' . __('User Guide') . '</a></li>
                                    <li><a href="https://www.geexu.com/faqs/" target="_blank">' . __('FAQs') . '</a></li>
                                    <li><a href="' . $this->getUrlByType($element, 'change_log') . '" target="_blank">' . __('Changelog') . '</a></li>
                                    <li><a href="https://dashboard.geexu.com/license/" target="_blank">' . __('Check Latest Version') . '</a></li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>';

        return $this->_decorateRowHtml($element, $html);
    }

    /**
     * Return element html
     *
     * @param AbstractElement $element
     *
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }

    /**
     * @param $element
     * @param string $type
     *
     * @return mixed
     */
    private function getUrlByType($element, $type = 'user_guide')
    {
        $moduleName = $element->getOriginalData()['module_name'];

        $packageName = $this->_packageInfoFactory->create()->getPackageName($moduleName);
        $lowerCaseName = str_replace(['geexu/magento-2-', '-extension', 'geexu/module-'], '', $packageName);
        $path = $this->helper->getModuleData($moduleName, $type) ?: str_replace('-m2', '', $lowerCaseName);

        if(strpos($path, 'http') === false){
            switch ($type) {
                case 'user_guide':
                    $domain = 'http://docs.geexu.com/';
                    break;
                case 'change_log':
                    $domain = 'https://www.geexu.com/releases/';
                    break;
                default:
                    $domain = 'https://www.geexu.com/';
            }

            $path = $domain . $path . '/';
        }

        return $path;
    }
}
