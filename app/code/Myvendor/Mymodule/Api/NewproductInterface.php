<?php
    namespace Myvendor\Mymodule\Api;

    //use Myvendor\Mymodule\Api\Data\PointInterface;

    interface NewproductInterface
    {

       /**
     * GET new product list
     *
     * @api
    * @return string[]
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function newproduct();
        
}