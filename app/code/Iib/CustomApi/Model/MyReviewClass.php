<?php
namespace Iib\CustomApi\Model;
use Iib\CustomApi\Api\MyReviewInterface;
use Magento\Framework\App\Bootstrap;    

class MyReviewClass implements MyReviewInterface{
    protected $request;
    public function __construct(\Magento\Framework\App\Request\Http $request) {
       $this->request = $request;
    }

     /**
     * GET  review by its ID
     *
     * @api
     * @param string $storeId
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getAllReviews($storeId){
        $bootstrap = Bootstrap::create(BP, $_SERVER);
        $obj = $bootstrap->getObjectManager();
        $state = $obj->get('Magento\Framework\App\State');

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
        $currentStoreId = $storeManager->getStore()->getId();
        $rating = $objectManager->get("Magento\Review\Model\ResourceModel\Review\CollectionFactory");

        //Apply filter for store id and status='Approved'
        $collection = $rating->create()->addStoreFilter($storeId
        )->addStatusFilter(\Magento\Review\Model\Review::STATUS_APPROVED);
            //Get All parameters from request
            $allParameters=$this->request->getParams();
           //Check parameter from_Date present or not
            if(array_key_exists("fromDate",$allParameters)){
                $collection=$collection->addFieldToFilter('created_at', ['gteq' => $allParameters['fromDate']]);
             }
             //Check parameter to_Date present or not
             if(array_key_exists("toDate",$allParameters)){
                $collection=$collection->addFieldToFilter('created_at', ['lteq' => $allParameters['toDate']]);
             }
             //Check parameter title present or not
             if(array_key_exists("title",$allParameters)){
                 $title=$allParameters['title'];
                $collection=$collection->addFieldToFilter('title', ['like' => '%'.$title.'%']);
             }
             //Check parameter text present or not
             if(array_key_exists("text",$allParameters)){
                $collection=$collection->addFieldToFilter('detail', ['like' => '%'.$allParameters['text'].'%']);
             }
             //Check parameter customer id present or not
             if(array_key_exists("customerId",$allParameters)){
                $collection=$collection->addFieldToFilter('customer_id', ['eq' => $allParameters['customerId']]);
             }
             //Check parameter product id present or not
             if(array_key_exists("productId",$allParameters)){
                $collection=$collection->addFieldToFilter('entity_pk_value', ['eq' => $allParameters['productId']]);
             }
             //Check paramter for maximum no. of product per page
             if(array_key_exists("pageSize",$allParameters)){
                $collection->setPageSize($allParameters['pageSize']);
             }
             //Check paramter for current page no. 
             if(array_key_exists("page",$allParameters)){
                $collection->setCurPage($allParameters['page']);
             }
            $result=$collection->getData();
            return $result;
    }

}