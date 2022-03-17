<?php

namespace Geexu\BannerSlider\Model\Command\Banners;

use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Exception\CouldNotSaveException;
use Geexu\BannerSlider\Model\ResourceModel\Banners as ResourceBanners;
use Geexu\BannerSlider\Model\BannersFactory ;

/**
 * Class Save
 * @package Geexu\BannerSlider\Model\Command\Banners
 */
class Save implements \Geexu\BannerSlider\Api\Command\Banners\SaveInterface {

    /**
     * @var ExtensibleDataObjectConverter
     */
    private $_extensibleDataObjectConverter;
    /**
     * @var BannersFactory
     */
    private $_bannersFactory;
    /**
     * @var ResourceBanners
     */
    private $_resource;

    /**
     * Save constructor.
     * @param BannersFactory $bannersFactory
     * @param ResourceBanners $resource
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public  function  __construct(
        BannersFactory $bannersFactory,
        ResourceBanners $resource,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter)
    {
        $this->_extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->_bannersFactory = $bannersFactory;
        $this->_resource = $resource;
    }

    /**
     * @param \Geexu\BannerSlider\Api\Data\BannersInterface $banners
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface
     * @throws CouldNotSaveException
     */
    public function execute(
        \Geexu\BannerSlider\Api\Data\BannersInterface $banners
    ) {

        $bannersData = $this->_extensibleDataObjectConverter->toNestedArray(
            $banners,
            [],
            \Geexu\BannerSlider\Api\Data\BannersInterface::class
        );

        $bannersModel = $this->_bannersFactory->create()->setData($bannersData);

        try {
            $this->_resource->save($bannersModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the banners: %1',
                $exception->getMessage()
            ));
        }
        return $bannersModel->getDataModel();
    }
}
