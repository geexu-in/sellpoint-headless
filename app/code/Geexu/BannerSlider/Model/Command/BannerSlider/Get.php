<?php

namespace Geexu\BannerSlider\Model\Command\BannerSlider;

use Geexu\BannerSlider\Api\Command\BannerSlider\GetInterface;

use Geexu\BannerSlider\Api\Data\BannerSliderInterface;
use Geexu\BannerSlider\Model\ResourceModel\BannerSlider as ResourceBannerSlider;
use Geexu\BannerSlider\Model\BannerSliderFactory ;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Get
 * @package Geexu\BannerSlider\Model\Command\BannerSlider
 */
class Get implements GetInterface {

    /**
     * @var ResourceBannerSlider
     */
    private $_resource;
    /**
     * @var BannerSliderFactory
     */
    private $_bannerSliderFactory;


    public  function  __construct(
        BannerSliderFactory $bannerSliderFactory,
        ResourceBannerSlider $resource
    )
    {
        $this->_bannerSliderFactory = $bannerSliderFactory;
        $this->_resource = $resource;
    }

    /**
     * @param $bannerSliderId
     * @return BannerSliderInterface
     * @throws NoSuchEntityException
     */
    public function execute($bannerSliderId) {

        $bannerSlider = $this->_bannerSliderFactory->create();
        $this->_resource->load($bannerSlider, $bannerSliderId);
        if (!$bannerSlider->getId()) {
            throw new NoSuchEntityException(__('BannerSlider with id "%1" does not exist.', $bannerSliderId));
        }
        return $bannerSlider->getDataModel();
    }
}
