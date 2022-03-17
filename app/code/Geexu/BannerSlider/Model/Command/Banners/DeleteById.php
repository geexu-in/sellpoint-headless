<?php

namespace Geexu\BannerSlider\Model\Command\Banners;

/**
 * Class DeleteById
 * @package Geexu\BannerSlider\Model\Command\Banners
 */
class DeleteById implements \Geexu\BannerSlider\Api\Command\Banners\DeleteByIdInterface {


    /**
     * @var Get
     */
    private $_get;
    /**
     * @var Delete
     */
    private $_delete;

    public  function  __construct(
        Get $get,
        Delete $delete
    )
    {
        $this->_get = $get;
        $this->_delete = $delete;
    }

    /**
     * @param $bannersId
     * @return bool|\Geexu\BannerSlider\Api\Data\BannersInterface
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute($bannersId
    )
    {
        $bannersModel = $this->_get->execute($bannersId);
        return $this->_delete->execute($bannersModel);
    }
}
