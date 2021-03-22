<?php

namespace Iib\Firebase\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class OrderSaveAfter  implements ObserverInterface
{

    protected $logger;
    protected $devices = [];
    protected $url = 'https://fcm.googleapis.com/fcm/send';

    protected $serverApiKey = "AAAAdLSQzIs:APA91bGqUFRoolCv_ZH1Z5MW37lZpYDIidDQizJouBQiiNWDI9FQgMRF5pKAI5eI9mLbTRJXUPyZ4md38RcPOchnILITgbKWHXP1onm84eBnN4-flaSG2YhBDm6ReTVqjTq0bvF-RWYN";
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        try {
            $order = $observer->getEvent()->getOrder();

            $customer_id = $order->getCustomerId();
            if(!$customer_id){
                return ;
            }
            $order_status = $order->getState();
            $order_id = $order->getId();
            // $this->logger->critical('Order Status' . $order->getState());
            // $this->logger->critical('Order Status' . $order->getCustomerId());
            $customer_token = $this->getCustomerToken($customer_id);
            // $this->logger->critical('Token' . $customer_token);

            $this->devices = [];
            $this->devices[] = $customer_token;

            $message = 'Your Order ' .$order_id . ' Status Changed To '. $order_status;
            $data['message'] = $message;
            $data['id'] = $order_id;
            $data['customer'] = $customer_id;
            $data['type'] = 1;

            $resp = $this->sendMessage($data, $message);
            $this->saveInDatabase($customer_id,json_encode($data),$message,1,$order_id);

            $this->logger->critical('Send status ' . json_encode($resp));


        } catch (\Exception $e) {
            var_dump($e);
            $this->logger->critical('Order Observer Send notification error  ' . $e->getMessage());
        }
    }

    public function getCustomerToken($customer_id)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('iib_firebase');

        $sql = "SELECT * FROM " . $tableName . " where `customer_id` = '" . $customer_id . "'";
        $result = $connection->fetchAll($sql);
        if ($result && $result[0] && $result[0]['firebase_token']) {
            return $result[0]['firebase_token'];
        } else {
            return null;
        }
    }

    public function sendMessage($data,$message)
    {

        if (!is_null($data)) {
            $fields = [
                'registration_ids' => $this->devices,
                'notification' => [
                    "body" => $message,
                    "data" => $data,
                ],
            ];
        } else {
            $fields = [
                'registration_ids' => $this->devices,
                'data' => ["message" => $message],
            ];
        }

        $headers = [
            'Authorization: key=' . $this->serverApiKey,
            'Content-Type: application/json'
        ];
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $this->url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Avoids problem with https certificate
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute post
        $result = curl_exec($ch);

        // Close connection
        curl_close($ch);
        return $result;
    }

    public function saveInDatabase($id,$data,$message,$type,$redirect_id){
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('iib_notifications');


        $sql = "INSERT INTO `{$tableName}`
                        (`request_label`, `request_id`, `customer_id`, `request_data` , `request_type`) 
                VALUES ('{$message}',       '{$redirect_id}',   '{$id}',   '{$data}' , '{$type}')";
        $result = $connection->query($sql);
        return $result;
    }
}
