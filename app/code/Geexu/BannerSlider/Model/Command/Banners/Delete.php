<?php

namespace Geexu\BannerSlider\Model\Command\Banners;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Geexu\BannerSlider\Model\ResourceModel\Banners as ResourceBanners;
use Geexu\BannerSlider\Model\BannersFactory ;
use Magento\Framework\Exception\NoSuchEntityException;


/**
 * Class Delete
 * @package Geexu\BannerSlider\Model\Command\Banners
 */
class Delete implements \Geexu\BannerSlider\Api\Command\Banners\DeleteInterface {

    /**
     * @var BannersFactory
     */
    private $_bannersFactory;
    /**
     * @var ResourceBanners
     */
    private $_resource;

    /**
     * Delete constructor.
     * @param BannersFactory $bannersFactory
     * @param ResourceBanners $resource
     */
    public  function  __construct(
        BannersFactory $bannersFactory,
        ResourceBanners $resource
    )
    {
        $this->_bannersFactory = $bannersFactory;
        $this->_resource = $resource;
    }

    /**
     * @param \Geexu\BannerSlider\Api\Data\BannersInterface $banners
     * @return bool|\Geexu\BannerSlider\Api\Data\BannersInterface
     * @throws CouldNotDeleteException
     */
    public function execute(
        \Geexu\BannerSlider\Api\Data\BannersInterface $banners
    ) {

        try {
            $bannersModel = $this->_bannersFactory->create();
            $this->_resource->load($bannersModel, $banners->getBannersId());
            $this->_resource->delete($bannersModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Banners: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }
}
