<?php


namespace Geexu\Blog\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Display
 * @package Geexu\Blog\Model\Config\Source
 */
class RelatedMode implements ArrayInterface
{
    const SLIDER = 1;
    const GRID = 2;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        foreach ($this->toArray() as $value => $label) {
            $options[] = [
                'value' => $value,
                'label' => $label
            ];
        }

        return $options;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [self::SLIDER => __('Slider'), self::GRID => __('Grid')];
    }
}
