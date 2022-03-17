<?php
namespace Mageplaza\HelloWorld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		
		echo "hello world";
		$empty = [];
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productCollectionFactory = $objectManager->get('\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
        $collection = $productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToSort('entity_id','desc');
        $collection->addFieldToFilter('visibility', 4);
        $collection->setPageSize(10); // selecting only 10 products

        foreach ($collection as $product) {
			$productsData[] = $product->getData();   
                if($product->getSpecialPrice()){
            		$productsData['save'] = (($product->getPrice()-$product->getSpecialPrice())/($product->getPrice())*100);
				}
				else{
					$productsData['save']= $empty;
				}
				echo "<pre>";
            print_r($productsData);
        }
	}
}
