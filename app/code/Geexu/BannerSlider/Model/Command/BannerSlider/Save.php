<?php

namespace Geexu\BannerSlider\Model\Command\BannerSlider;

use Geexu\BannerSlider\Api\Command\BannerSlider\SaveInterface;
use Geexu\BannerSlider\Api\Data\BannerSliderInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Exception\CouldNotSaveException;
use Geexu\BannerSlider\Model\ResourceModel\BannerSlider as ResourceBannerSlider;
use Geexu\BannerSlider\Model\BannerSliderFactory ;

/**
 * Class Save
 * @package Geexu\BannerSlider\Model\Command\BannerSlider
 */
class Save implements SaveInterface {

    /**
     * @var ExtensibleDataObjectConverter
     */
    private $_extensibleDataObjectConverter;
    /**
     * @var BannerSliderFactory
     */
    private $_bannerSliderFactory;
    /**
     * @var ResourceBannerSlider
     */
    private $_resource;

    /**
     * Save constructor.
     * @param BannerSliderFactory $bannerSliderFactory
     * @param ResourceBannerSlider $resource
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public  function  __construct(
        BannerSliderFactory $bannerSliderFactory,
        ResourceBannerSlider $resource,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter)
    {
        $this->_extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->_bannerSliderFactory = $bannerSliderFactory;
        $this->_resource = $resource;
    }

    /**
     * @param BannerSliderInterface $bannerSlider
     * @return BannerSliderInterface
     * @throws CouldNotSaveException
     */
    public function execute(
        BannerSliderInterface $bannerSlider
    ) {

        $bannerSliderData = $this->_extensibleDataObjectConverter->toNestedArray(
            $bannerSlider,
            [],
            BannerSliderInterface::class
        );

        $bannerSliderModel = $this->_bannerSliderFactory->create()->setData($bannerSliderData);

        try {
            $this->_resource->save($bannerSliderModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the banners: %1',
                $exception->getMessage()
            ));
        }
        return $bannerSliderModel->getDataModel();
    }
}
