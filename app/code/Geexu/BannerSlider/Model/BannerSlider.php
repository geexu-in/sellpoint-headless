<?php

namespace Geexu\BannerSlider\Model;

use Geexu\BannerSlider\Api\Data\BannerSliderInterface;
use Magento\Framework\Api\DataObjectHelper;
use Geexu\BannerSlider\Api\Data\BannerSliderInterfaceFactory;

/**
 * Class BannerSlider
 * @package Geexu\BannerSlider\Model
 */
class BannerSlider extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'geexu_bannerslider_bannerslider';
    protected $bannersliderDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param BannerSliderInterfaceFactory $bannersliderDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Geexu\BannerSlider\Model\ResourceModel\BannerSlider $resource
     * @param \Geexu\BannerSlider\Model\ResourceModel\BannerSlider\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        BannerSliderInterfaceFactory $bannersliderDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Geexu\BannerSlider\Model\ResourceModel\BannerSlider $resource,
        \Geexu\BannerSlider\Model\ResourceModel\BannerSlider\Collection $resourceCollection,
        array $data = []
    ) {
        $this->bannersliderDataFactory = $bannersliderDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve bannerslider model with bannerslider data
     * @return BannerSliderInterface
     */
    public function getDataModel()
    {
        $bannersliderData = $this->getData();

        $bannersliderDataObject = $this->bannersliderDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $bannersliderDataObject,
            $bannersliderData,
            BannerSliderInterface::class
        );

        return $bannersliderDataObject;
    }
}
