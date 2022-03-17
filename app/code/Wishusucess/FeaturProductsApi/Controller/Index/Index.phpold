<?php
/**
*
* Developer: Hemant Singh Magento 2x Developer
* Category:  Wishusucess_FeaturProductsApi
* Website:   http://www.wishusucess.com/
*/
namespace Wishusucess\FeaturProductsApi\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action {

  /** @var \Magento\Framework\View\Result\PageFactory  */
      protected $resultPageFactory;
       
      public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;        
        $this->catalogProductVisibility = $catalogProductVisibility;
        parent::__construct(
            $context,
            $data
        );
    }
            
       public function execute() {
        $collection = $this->_productCollectionFactory->create();
        $collection = $this->_productCollectionFactory->create()->addAttributeToSelect('*')->addAttributeToFilter('status', '1')
                        ->addAttributeToFilter('featured', '1');

        $collection->setVisibility($this->catalogProductVisibility->getVisibleInCatalogIds());
       $response = $collection;

       echo "<pre>";
    //    print_r($response->getData());
    $cart = array();
    foreach($response as $value)
    {
        $cart[] = $value->getData();
    }

    print_r($cart);
       die();
              
          }
          
      }