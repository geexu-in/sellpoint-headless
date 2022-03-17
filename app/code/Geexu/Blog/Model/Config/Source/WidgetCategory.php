<?php


namespace Geexu\Blog\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Geexu\Blog\Model\ResourceModel\Category\CollectionFactory;

/**
 * Class WidgetCategory
 * @package Geexu\Blog\Model\Config\Source\Widget
 */
class WidgetCategory implements ArrayInterface
{
    /**
     * @var CollectionFactory
     */
    private $category;

    /**
     * WidgetCategory constructor.
     *
     * @param CollectionFactory $category
     */
    public function __construct(
        CollectionFactory $category
    ) {
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $collection = $this->category->create();
        $ar = [];
        foreach ($collection->getItems() as $item) {
            if ($item->getId() === '1') {
                continue;
            }
            $ar[] = ['value' => $item->getId(), 'label' => $item->getName()];
        }

        return $ar;
    }
}
