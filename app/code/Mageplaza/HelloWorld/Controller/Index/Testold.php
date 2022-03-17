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
		//echo "Hello World";

        echo "<br />";    
        $objectManager =   \Magento\Framework\App\ObjectManager::getInstance();
        $connection = $objectManager->get('Magento\Framework\App\ResourceConnection')->getConnection('\Magento\Framework\App\ResourceConnection::DEFAULT_CONNECTION'); 
        $result1 = $connection->fetchAll("SELECT * FROM amasty_acart_rule_quote");
        $dt = $connection->fetchAll("SELECT telephone,email FROM customer_entity INNER JOIN customer_address_entity ON customer_address_entity.parent_id = customer_entity.entity_id;");

        $customerId = 2;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $customerObj = $objectManager->create('Magento\Customer\Model\Customer')->load($customerId);
        $customerAddress = array();
        
        foreach ($customerObj->getAddresses() as $address)
        {
            $customerAddress[] = $address->toArray();
        }
        
        foreach ($customerAddress as $customerAddres) {
            //echo $customerAddres['street'];
            //echo "<br>";
           // echo $customerAddres['city'];
           // echo "<br>";
           // echo $customerAddres['telephone'];
           // echo "<br>";
        }
     
   // echo "<pre>";print_r($dt);
    
    $data = array_reverse($result1);
   // echo "<pre>";print_r(array_reverse($data));

    echo "<table>";
        foreach($data as $value)
        {     
            foreach($dt as $value1)  
            {
                if($value['customer_email'] == $value1['email'])
                {
                    echo "<tr>";
                    echo "<td>";
                    echo $value['quote_id'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['rule_quote_id'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['rule_id'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['store_id'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['customer_id'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['customer_email'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['customer_firstname'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['customer_lastname'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['status'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['created_at'];
                    echo "</td>";
                    echo "<td>";
                    echo $value1['telephone'];
                    echo "</td>";
                    echo "</tr>";
                    
                }
            }   
            
        }
        echo "</table>";

	}
}