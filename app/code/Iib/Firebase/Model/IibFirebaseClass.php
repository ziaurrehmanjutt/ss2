<?php
namespace Iib\Firebase\Model;
use Iib\Firebase\Api\FirebaseInterface;
use Magento\Framework\App\Bootstrap;  
use Magento\Framework\App\Action\Context;  
use Magento\Framework\View\Element\Template;

class IibFirebaseClass  
   // extends \Magento\Framework\App\Action\Action 
   extends Template
   // implements FirebaseInterface
   {
    protected $request;
    
    public function __construct(\Magento\Framework\App\Request\Http $request ,\Magento\Framework\View\Element\Template\Context $context) {
       $this->request = $request;
       parent::__construct($context);
    }

     /**
     * GET  review by its ID
     *
     * @api
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function addCustomerToken(){
   
      $rawData = file_get_contents("php://input");
      $rawData = json_decode($rawData);
 
 
      $customer_token = $rawData->customer_token;
      $customer_id = $rawData->customer_id;

      $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
      $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
      $connection = $resource->getConnection();
      $tableName = $resource->getTableName('iib_firebase');

      $sql = "SELECT * FROM " . $tableName . " where `customer_id` = '" . $customer_id ."'";
      $result = $connection->fetchAll($sql); 

 
      if($result){
          $sql = "UPDATE `iib_firebase` SET `firebase_token`='{$customer_token}' WHERE `customer_id` = {$customer_id} ";
      }else{
         $sql = "INSERT INTO `iib_firebase`( `firebase_token`, `customer_id`) VALUES ('{$customer_token}','{$customer_id}')";
      }
  

      $result = $connection->query($sql);

      if($result){
         $message['status'] = true;
         $message['message'] =  'Status Update Successfully';
         return $message;
      }else{
         $message['status'] = false;
         $message['message'] =  'Something Went Wrong';
         return $message;
      }
    }

         /**
     * GET  review by its ID
     *
     * @api
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getAllNotifications(){
   
      $rawData = file_get_contents("php://input");
      $rawData = json_decode($rawData);
 
      $limit = 20;
      if (isset($rawData->limit)){
         $limit = $rawData->limit;
      }
      $limit = $rawData->customer_token;
      $page = $rawData->page;
      $customer_id = $rawData->customer_id;

      $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
      $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
      $connection = $resource->getConnection();
      $tableName = $resource->getTableName('iib_firebase');

      $sql = "SELECT * FROM " . $tableName . " where `customer_id` = '" . $customer_id ."'";
      $result = $connection->fetchAll($sql); 

 
      if($result){
          $sql = "UPDATE `iib_firebase` SET `firebase_token`='{$customer_token}' WHERE `customer_id` = {$customer_id} ";
      }else{
         $sql = "INSERT INTO `iib_firebase`( `firebase_token`, `customer_id`) VALUES ('{$customer_token}','{$customer_id}')";
      }
  

      $result = $connection->query($sql);

      if($result){
         $message['status'] = true;
         $message['message'] =  'Status Update Successfully';
         return $message;
      }else{
         $message['status'] = false;
         $message['message'] =  'Something Went Wrong';
         return $message;
      }
    }

}