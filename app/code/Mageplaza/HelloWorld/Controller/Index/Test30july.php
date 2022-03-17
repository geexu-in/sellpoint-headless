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
        //$result1 = $connection->fetchAll("SELECT * FROM amasty_acart_rule_quote");
        $dt = $connection->fetchAll("SELECT telephone,email FROM customer_entity INNER JOIN customer_address_entity ON customer_address_entity.parent_id = customer_entity.entity_id;");
        $res_new = $connection->fetchAll('SELECT amasty_acart_history.status,amasty_acart_history.history_id, amasty_acart_rule_quote.customer_email, amasty_acart_history_details.product_name,amasty_acart_history_details.sku,amasty_acart_history_details.price,amasty_acart_history_details.qty
        FROM amasty_acart_rule_quote
        right JOIN amasty_acart_history
        ON amasty_acart_rule_quote.rule_quote_id = amasty_acart_history.rule_quote_id
        left JOIN amasty_acart_history_details
        ON amasty_acart_history.history_id=amasty_acart_history_details.history_id
        where amasty_acart_history.status="sent" Order by amasty_acart_history.scheduled_at DESC;
        ');
        $product_data = $connection->fetchAll("select * from amasty_acart_history_details ORDER BY history_id DESC;");
        $emptyArray = []; 
        echo "<br>";
        //echo "<pre>";print_r($product_data);
        echo "<br>";

        echo "<script>console.log(".json_encode($product_data).");</script>";

        $myarray = []; 
        
        foreach($product_data as $value)
        {
            echo "<br>";
            echo "<pre>";print_r($value);
            echo "<br>";
            //  $emptyArray['history_id'] = $value['history_id'];
            //  $array_count = array_count_values($value); 
            //  if(in_array( $emptyArray['history_id'] ,$value ) )
            // {
            //     array_push($value,$emptyArray['history_id']);
            //     echo "<pre>";print_r($value);
            // }
            //  echo "<br>";
            // // echo "<pre>";print_r($array_count);
            //  echo "<br>";
            // // if(in_array($value['history_id'], $value)){
            // //     array_push($value,$value['history_id']);
            // //    echo "<pre>";print_r($value);
            // //     $myarray[] = array_push($value);
            // //  echo "<pre>";print_r($myarray);
            // // }
            // // if (in_array($value['history_id'], $value)) {
                

            // //     array_push($value,$value['history_id']);
            // //     echo "<pre>";print_r($value);
            // //    // $myarray[] = array_push($value);
            // //    // echo "<pre>";print_r($myarray);
            // // }
        }

die;

    echo "<table>";
        foreach($res_new as $value)
        {     
            echo "<tr>";
                    echo "<td>";
                    echo $value['status'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['history_id'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['customer_email'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['product_name'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['sku'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['price'];
                    echo "</td>";
                    echo "<td>";
                    echo $value['qty'];
                    echo "</td>";
                        
            foreach($dt as $value1)  
            {
                if($value['customer_email'] == $value1['email'])
                {
                    echo "<td>";
                    $value['telephone'] = $value1['telephone'];
                    echo $value['telephone'];
                    echo "</td>";
                    echo "</tr>";
                    
                }
           }   
          // echo "<pre>";print_r(array_reverse($value));
            
        }
        echo "</table>";
        echo "<br>";
	}
}
