<?php
namespace Myvendor\Mymodule\Model;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Myvendor\Mymodule\Api\NewproductInterface;

class Newproduct implements NewproductInterface
{
     const DEFAULT_PRODUCTS_COUNT = 10;
    //protected $searchCriteriaBuilder;
    /**   
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    protected $productRepository;
    protected $_localeDate;
    protected $_catalogConfig;
    protected $_productsCount;

    public function __construct(
       ProductRepositoryInterface $productRepository,
       //SearchCriteriaBuilder $searchCriteriaBuilder,
       \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
       \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
       \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate,
       \Magento\Catalog\Block\Product\Context $context
    )
    {
        $this->productRepository = $productRepository;
        //$this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_catalogProductVisibility = $catalogProductVisibility;
        $this->_localeDate = $localeDate;
        $this->_catalogConfig = $context->getCatalogConfig();
    }


    protected function _addProductAttributesAndPrices(
        \Magento\Catalog\Model\ResourceModel\Product\Collection $collection
    ) {
        return $collection
            ->addMinimalPrice()
            ->addFinalPrice()
            ->addTaxPercents()
            ->addAttributeToSelect($this->_catalogConfig->getProductAttributes())
            ->addUrlRewrite();
    }

    public function setProductsCount($count)
    {
        $this->_productsCount = $count;
        return $this;
    }

    public function getProductsCount()
    {
        if (null === $this->_productsCount) {
            $this->_productsCount = self::DEFAULT_PRODUCTS_COUNT;
        }
        return $this->_productsCount;
    }
    /**
     * {@inheritdoc}
     */
    public function newproduct()
    {
        //$productsData = [];
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productCollectionFactory = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $collection = $productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToSort('entity_id','desc');
        $collection->addFieldToFilter('visibility', 4);
        $collection->addAttributeToFilter('type_id', ['eq' => 'simple']);
        $collection->setPageSize(10); // selecting only 10 products

        foreach ($collection as $product) {
            
            $productsData[] = $product->getData();     
           // echo "<br>";
        }
        return $productsData;
       // $product1 = $objectManager->get('Magento\Catalog\Model\Product')->load($product->getId());
       
    }
}


