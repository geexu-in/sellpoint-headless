<?php


namespace Geexu\Core\Block\Adminhtml\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Exception\LocalizedException;
use Geexu\Core\Helper\AbstractData;
use Geexu\Core\Helper\Validate;

/**
 * Class Button
 * @package Geexu\Core\Block\Adminhtml\System\Config
 */
class Button extends Field
{
    /**
     * @var string
     */
    protected $_template = 'system/config/button.phtml';

    /**
     * @var AbstractData
     */
    protected $_helper;

    /**
     * Button constructor.
     *
     * @param Context $context
     * @param Validate $helper
     * @param array $data
     */
    public function __construct(
        Context $context,
        Validate $helper,
        array $data = []
    ) {
        $this->_helper = $helper;

        parent::__construct($context, $data);
    }

    /**
     * @return string
     * @throws LocalizedException
     */
    public function getButtonHtml()
    {
        $activeButton = $this->getLayout()
            ->createBlock(\Magento\Backend\Block\Widget\Button::class)
            ->setData([
                'id'      => 'geexu_module_active',
                'label'   => __('Activate Now'),
                'onclick' => 'javascript:geexuModuleActive(); return false;',
            ]);

        $cancelButton = $this->getLayout()
            ->createBlock(\Magento\Backend\Block\Widget\Button::class)
            ->setData([
                'id'      => 'geexu_module_update',
                'label'   => __('Update this license'),
                'onclick' => 'javascript:geexuModuleUpdate(); return false;',
            ]);

        return $activeButton->toHtml() . $cancelButton->toHtml();
    }

    /**
     * Render button
     *
     * @param AbstractElement $element
     *
     * @return string
     */
    public function render(AbstractElement $element)
    {
        // Remove scope label
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();

        return parent::render($element);
    }

    /**
     * @return string
     */
    public function getButtonUrl()
    {
        return '';
    }

    /**
     * Return element html
     *
     * @param AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $originalData = $element->getOriginalData();
        $path = explode('/', $originalData['path']);
        $this->addData(
            [
                'mp_is_active'       => $this->_helper->isModuleActive($originalData['module_name']),
                'mp_module_name'     => $originalData['module_name'],
                'mp_module_type'     => $originalData['module_type'],
                'mp_active_url'      => $this->getUrl('mpcore/index/activate'),
                'mp_free_config'     => Validate::jsonEncode($this->_helper->getConfigValue('free/module') ?: []),
                'mp_module_html_id'  => implode('_', $path),
                'mp_module_checkbox' => $this->_helper->getModuleCheckbox($originalData['module_name'])
            ]
        );

        return $this->_toHtml();
    }
}
