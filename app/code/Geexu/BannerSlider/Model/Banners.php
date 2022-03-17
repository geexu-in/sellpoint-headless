<?php


namespace Geexu\BannerSlider\Model;

use Geexu\BannerSlider\Api\Data\BannersInterface;
use Magento\Framework\Api\DataObjectHelper;
use Geexu\BannerSlider\Api\Data\BannersInterfaceFactory;

/**
 * Class Banners
 * @package Geexu\BannerSlider\Model
 */
class Banners extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $bannersDataFactory;

    protected $_eventPrefix = 'geexu_bannerslider_banners';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param BannersInterfaceFactory $bannersDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Geexu\BannerSlider\Model\ResourceModel\Banners $resource
     * @param \Geexu\BannerSlider\Model\ResourceModel\Banners\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        BannersInterfaceFactory $bannersDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Geexu\BannerSlider\Model\ResourceModel\Banners $resource,
        \Geexu\BannerSlider\Model\ResourceModel\Banners\Collection $resourceCollection,
        array $data = []
    ) {
        $this->bannersDataFactory = $bannersDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve banners model with banners data
     * @return BannersInterface
     */
    public function getDataModel()
    {
        $bannersData = $this->getData();

        $bannersDataObject = $this->bannersDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $bannersDataObject,
            $bannersData,
            BannersInterface::class
        );

        return $bannersDataObject;
    }


}
