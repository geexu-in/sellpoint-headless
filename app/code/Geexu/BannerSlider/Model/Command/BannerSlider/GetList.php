<?php

namespace Geexu\BannerSlider\Model\Command\BannerSlider;

use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Geexu\BannerSlider\Model\BannerSliderFactory ;
use Geexu\BannerSlider\Api\Data\BannerSliderSearchResultsInterfaceFactory;

use Geexu\BannerSlider\Model\ResourceModel\BannerSlider\CollectionFactory as BannerSliderCollectionFactory;

/**
 * Class GetList
 * @package Geexu\BannerSlider\Model\Command\BannerSlider
 */
class GetList implements \Geexu\BannerSlider\Api\Command\BannerSlider\GetListInterface {


    /**
     * @var BannerSliderCollectionFactory
     */
    private $_bannerSliderCollectionFactory;
    /**
     * @var JoinProcessorInterface
     */
    private $_extensionAttributesJoinProcessor;
    /**
     * @var CollectionProcessorInterface
     */
    private $_collectionProcessor;
    /**
     * @var BannerSliderSearchResultsInterfaceFactory
     */
    private $_searchResultsFactory;


    /**
     * GetList constructor.
     * @param BannerSliderCollectionFactory $bannerSliderCollectionFactory
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param CollectionProcessorInterface $collectionProcessor
     * @param BannerSliderSearchResultsInterfaceFactory $searchResultsFactory
     * @param BannerSliderFactory $bannerSliderFactory
     */
    public  function  __construct(
        BannerSliderCollectionFactory $bannerSliderCollectionFactory,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        CollectionProcessorInterface $collectionProcessor,
        BannerSliderSearchResultsInterfaceFactory $searchResultsFactory,
        BannerSliderFactory $bannerSliderFactory
    )
    {
        $this->_bannerSliderCollectionFactory = $bannerSliderCollectionFactory;
        $this->_extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->_collectionProcessor = $collectionProcessor;
        $this->_searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Geexu\BannerSlider\Api\Data\BannerSliderInterface|\Geexu\BannerSlider\Api\Data\BannerSliderSearchResultsInterface
     */
    public function execute(\Magento\Framework\Api\SearchCriteriaInterface $criteria) {

        $collection = $this->_bannerSliderCollectionFactory->create();

        $this->_extensionAttributesJoinProcessor->process(
            $collection,
            \Geexu\BannerSlider\Api\Data\BannerSliderInterface::class
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
