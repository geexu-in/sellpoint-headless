<?php

namespace Geexu\BannerSlider\Model\Command\Banners;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Geexu\BannerSlider\Model\BannersFactory ;
use Geexu\BannerSlider\Api\Data\BannersSearchResultsInterfaceFactory;

use Geexu\BannerSlider\Model\ResourceModel\Banners\CollectionFactory as BannersCollectionFactory;

/**
 * Class GetList
 * @package Geexu\BannerSlider\Model\Command\Banners
 */
class GetList implements \Geexu\BannerSlider\Api\Command\Banners\GetListInterface {


    /**
     * @var BannersCollectionFactory
     */
    private $_bannersCollectionFactory;
    /**
     * @var JoinProcessorInterface
     */
    private $_extensionAttributesJoinProcessor;
    /**
     * @var CollectionProcessorInterface
     */
    private $_collectionProcessor;
    /**
     * @var BannersSearchResultsInterfaceFactory
     */
    private $_searchResultsFactory;


    /***
     * GetList constructor.
     * @param BannersCollectionFactory $bannersCollectionFactory
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param CollectionProcessorInterface $collectionProcessor
     * @param BannersSearchResultsInterfaceFactory $searchResultsFactory
     * @param BannersFactory $bannersFactory
     */
    public  function  __construct(
        BannersCollectionFactory $bannersCollectionFactory,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        CollectionProcessorInterface $collectionProcessor,
        BannersSearchResultsInterfaceFactory $searchResultsFactory,
        BannersFactory $bannersFactory
    )
    {
        $this->_bannersCollectionFactory = $bannersCollectionFactory;
        $this->_extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->_collectionProcessor = $collectionProcessor;
        $this->_searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Geexu\BannerSlider\Api\Data\BannersInterface|\Geexu\BannerSlider\Api\Data\BannersSearchResultsInterface
     */
    public function execute(\Magento\Framework\Api\SearchCriteriaInterface $criteria) {

        $collection = $this->_bannersCollectionFactory->create();

        $this->_extensionAttributesJoinProcessor->process(
            $collection,
            \Geexu\BannerSlider\Api\Data\BannersInterface::class
        );

        $this->_collectionProcessor->process($criteria, $collection);

        $searchResults = $this->_searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
