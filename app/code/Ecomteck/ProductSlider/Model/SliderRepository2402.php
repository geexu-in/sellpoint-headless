<?php


namespace Ecomteck\ProductSlider\Model;

use Ecomteck\ProductSlider\Api\Data;
use Ecomteck\ProductSlider\Api\SliderRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Mageplaza\Productslider\Model\ResourceModel\Slider as ResourceSlider;
use Mageplaza\Productslider\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;

/**
 * Class SliderRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SliderRepository implements SliderRepositoryInterface
{

    /**
     * @var ResourceSlider
     */
    protected $resource;

    /**
     * @var SliderFactory
     */
    protected $sliderFactory;

    /**
     * @var SliderCollectionFactory
     */
    protected $sliderCollectionFactory;

    /**
     * @var \Ecomteck\ProductSlider\Api\Data\SliderSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    public function __construct(
        ResourceSlider $resource,
        SliderFactory $sliderFactory,
        SliderCollectionFactory $sliderCollectionFactory,
        \Ecomteck\ProductSlider\Api\Data\SliderSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor = null
    ) {
        $this->resource = $resource;
        $this->sliderFactory = $sliderFactory;
        $this->sliderCollectionFactory = $sliderCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save slider.
     *
     * @param \Ecomteck\ProductSlider\Api\Data\SliderInterface $slider
     * @return \Ecomteck\ProductSlider\Api\Data\SliderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Ecomteck\ProductSlider\Api\Data\SliderInterface $slider)
    {
        if ($slider->getStoreIds() === null) {
            $storeId = $this->storeManager->getStore()->getId();
            $slider->setStoreIds($storeId);
        }
        try {
            $this->resource->save($slider);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the slider: %1', $exception->getMessage()),
                $exception
            );
        }

        return $slider;
    }

    /**
     * Retrieve slider.
     *
     * @param int $sliderId
     * @return \Ecomteck\ProductSlider\Api\Data\SliderInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($sliderId)
    {
        $slider = $this->sliderFactory->create();
        $slider->load($sliderId);
        if (!$slider->getId()) {
            throw new NoSuchEntityException(__('The Product slider with the "%1" ID doesn\'t exist.', $sliderId));
        }
        return $slider;
    }

    /**
     * Retrieve sliders matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Ecomteck\ProductSlider\Api\Data\SliderSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \Mageplaza\Productslider\Model\ResourceModel\Slider\Collection $collection */
        $collection = $this->sliderCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Ecomteck\ProductSlider\Api\Data\SliderSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete slider.
     *
     * @param \Ecomteck\ProductSlider\Api\Data\SliderInterface $slider
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Ecomteck\ProductSlider\Api\Data\SliderInterface $slider)
    {
        try {
            $this->resource->delete($slider);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the slider: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete slider by ID.
     *
     * @param int $sliderId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($sliderId)
    {
        return $this->delete($this->getById($sliderId));
    }

    /**
     * Retrieve collection processor
     *
     * @deprecated 102.0.0
     * @return CollectionProcessorInterface
     */
    private function getCollectionProcessor()
    {
        if (!$this->collectionProcessor) {
            $this->collectionProcessor = \Magento\Framework\App\ObjectManager::getInstance()->get(
                'Ecomteck\ProductSlider\Model\Api\SearchCriteria\SliderCollectionProcessor'
            );
        }
        return $this->collectionProcessor;
    }
    /**
     * Retrieve product slider collection by slider id
     * @param string $id
     * @return string[]
     */
    public function getProductsBySliderId($sliderId)
    {
        $sql = "select product_ids from mageplaza_productslider_slider where slider_id=".$sliderId;

        $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
        $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
        $productRepository = $objectManager->get('\Magento\Catalog\Model\ProductRepository');
       
        $res_new = $connection->fetchAll($sql);
        $ids = explode("&", $res_new[0]['product_ids']);
        $porductIds=array($ids);
            
                
        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        $collectionByIds = $productCollection->addAttributeToSelect('*');
        $collectionByIds->addFieldToFilter('entity_id', array('in' => $porductIds));
        $collectionByIds->load();

	$query = 'select * from mageplaza_productslider_slider where slider_id = '.$sliderId;
   	$new = $connection->fetchAll($query);

	$SliderDetails=array($new);


$stockItem = $objectManager->get('\Magento\CatalogInventory\Model\Stock\StockItemRepository');
//$productId = 1; // YOUR PRODUCT ID

//var_dump();

	foreach ($collectionByIds as $collection) {
		    $Id = $collection->getId();
            $Name = $collection->getName();
            $SpecialPrice = $collection->getFinalPrice();
            $RegularPrice = $collection->getPrice();
		    $Image = 'catalog/product'.$collection->getImage();
		    $Product_url = $collection->getUrlKey();
		    
		    $sku = $collection->getSku();
          
            $productStockInfo = $stockItem->get($Id);

            
            $stock_status = $productStockInfo->getData();
            //code starts here
            if($collection->getSku()){
                $_product = $productRepository->get($collection->getSku());
                if($collection->getTypeId() == "simple") {
                    $simplePrice = $_product->getPrice();
                    $_finalPrice =$_product->getFinalPrice();
                } 
                else {
                        $_children = $_product->getTypeInstance()->getUsedProducts($_product);
                        foreach ($_children as $child){
                        $simplePrice = $child->getPrice();
                        break;
                    }
                }
                $save = (array) null;
                $_finalPrice =$_product->getFinalPrice();
                $_price = $simplePrice;
                if($_finalPrice < $_price) {
                $_savingPercent = 100 - round(($_finalPrice / $_price)*100);
               // $ProductDetails["save"] = $_savingPercent."%";
               $save = $_savingPercent;

                }
                $ProductDetails[] =["id" => $Id,"name"=> $Name,"specialprice" =>$SpecialPrice,"regularprice"=>$RegularPrice,"image"=>$Image,"producturl"=>$Product_url,"stockstatus"=>$stock_status,"sku"=>$sku,"save"=>$save];
            }
            //code ends here
            
	    }

	    array_push($SliderDetails,$ProductDetails);
        
       return $SliderDetails;
    }
}
