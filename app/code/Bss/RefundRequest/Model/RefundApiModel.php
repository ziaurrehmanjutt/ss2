<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at thisURL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_RefundRequest
 * @author     Extension Team
 * @copyright  Copyright (c) 2017-2018 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Bss\RefundRequest\Model;

use Bss\RefundRequest\Model\ResourceModel\Request\CollectionFactory;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Sales\Block\Order\History;
use Bss\RefundRequest\Helper\Email;
use Magento\Sales\Api\Data\OrderInterface;
use Bss\RefundRequest\Model\RequestFactory;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollection;

class RefundApiModel extends Template
{
    /**
     * @var Email
     */
    protected $emailSender;
    /**
     * @var \Bss\RefundRequest\Helper\Data
     */
    protected $helper;

    /**
     * @var \Bss\RefundRequest\Model\ResourceModel\Label\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var CollectionFactory
     */
    protected $requestCollectionFactory;

    /**
     * @var History
     */
    protected $history;

    /**
     * @var Context
     */
    private $context;

    /**
     * @var array
     */
    private $data;

    /**
     * @var \Magento\Framework\Data\Form\FormKey
     */
    protected $formKey;
    /**
     * @var CustomerSession
     */
    private $customerSession;
    /**
     * @var OrderCollection
     */
    private $orderCollectionFactory;

    /**
     * @var OrderInterface
     */

    protected $orderInterface;
    /**
     * @var RequestFactory
     */
    protected $requestFactory;
    /**
     * @var \Bss\RefundRequest\Model\ResourceModel
     */
    protected $statusResourceModel;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

     /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $timezone;

    /**
     * @var \Magento\Framework\Locale\ListsInterface
     */
    protected $localeLists;
   
    /**
     * Label constructor.
     * @param Email $emailSender
     * @param \Bss\RefundRequest\Helper\Data $helper
     * @param History $history
     * @param \Bss\RefundRequest\Model\ResourceModel\Label\CollectionFactory $collectionFactory
     * @param CollectionFactory $requestCollectionFactory
     * @param OrderCollection $orderCollectionFactory
     * @param Context $context
     * @param CustomerSession $customerSession
     * @param array $data
     * @param OrderInterface $orderInterface
     * @param RequestFactory $requestFactory
     * @param \Magento\Framework\Locale\ListsInterface $localeLists
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
     * @param \Bss\RefundRequest\Model\ResourceModel\Status $statusResourceModel
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Bss\RefundRequest\Helper\Data $helper,
        History $history,
        \Bss\RefundRequest\Model\ResourceModel\Label\CollectionFactory $collectionFactory,
        CollectionFactory $requestCollectionFactory,
        OrderCollection $orderCollectionFactory,
        Context $context,
        CustomerSession $customerSession,
        \Magento\Framework\Locale\ListsInterface $localeLists,
        array $data = [],
        RequestFactory $requestFactory,
        Email $emailSender,
        OrderInterface $orderInterface,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Bss\RefundRequest\Model\ResourceModel\Status $statusResourceModel
    ) {
        $this->helper = $helper;
        $this->requestCollectionFactory = $requestCollectionFactory;
        $this->history = $history;
        $this->collectionFactory = $collectionFactory;
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->formKey = $context->getFormKey();
        $this->statusResourceModel = $statusResourceModel;
        parent::__construct($context, $data);
        $this->context = $context;
        $this->data = $data;
        $this->timezone = $timezone;
        $this->scopeConfig = $scopeConfig;
        $this->customerSession = $customerSession;
        $this->orderInterface     = $orderInterface;
        $this->requestFactory    = $requestFactory;
        $this->emailSender        = $emailSender;
        $this->localeLists = $localeLists;
    }

    const STATUS_ACCEPT = 1;
    const STATUS_REJECT = 2;
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        parent::_construct();
        $this->pageConfig->getTitle()->set(__('My Account'));
    }

    /**
     * @return string
     */
    public function getConfigEnableModule()
    {
        return $this->helper->getConfigEnableModule();
    }

    /**
     * @return string
     */
    public function getPopupDescription()
    {
        return $this->helper->getDescription();
    }

    /**
     * @return string
     */
    public function getConfigEnableDropdown()
    {
        return $this->helper->getConfigEnableDropdown();
    }

    /**
     * @return string
     */
    public function getDropdownTitle()
    {
        return $this->helper->getDropdownTitle();
    }

    /**
     * @return string
     */
    public function getConfigEnableOption()
    {
        return $this->helper->getConfigEnableOption();
    }

    /**
     * @return string
     */
    public function getOptionTitle()
    {
        return $this->helper->getOptionTitle();
    }

    /**
     * @return string
     */
    public function getDetailTitle()
    {
        return $this->helper->getDetailTitle();
    }

    /**
     * @return string
     */
    public function getPopupModuleTitle()
    {
        return $this->helper->getPopupModuleTitle();
    }

    /**
     * @return mixed
     */
    public function getOrderRefund()
    {
        return $this->helper->getOrderRefund();
    }

    /**
     * @return \Bss\RefundRequest\Model\ResourceModel\Request\Collection
     */
    public function getRefundStatus()
    {
        $refundCollection = $this->requestCollectionFactory->create();
        $refundCollection->addFieldToSelect(['refund_status', 'increment_id']);
        return $refundCollection;
    }

    /**
     * @return \Bss\RefundRequest\Model\ResourceModel\Label\Collection
     */
    public function getLabel()
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('status', 0);
        return $collection;
    }

    /**
     * @return bool|\Magento\Sales\Model\ResourceModel\Order\Collection
     */
    public function getOrder()
    {
        return 'OKKOK';
        return $this->history->getOrders();
    }

    /**
     * @return string
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    /**
     * @api
     * @param string $order_id
     * @return array
     */
    public function getOrderCollectionByCustomerIdApi($order_id)
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('bss_refundrequest');

        $sql = "SELECT * FROM " . $tableName . " where `increment_id` = '" . $order_id ."'";
        $result = $connection->fetchAll($sql); 
        if($result){
            return $result[0];
        }else{
             return [];
        }

        return [];



        $customerId = $order_id;
        $collection = $orders = [];

        // $orders['cusm'] = $customer_id;
        if ($customerId) {
            $collection = $this->orderCollectionFactory->create()->addFieldToSelect(
                '*'
            )->addFieldToFilter(
                'customer_id',
                $customerId
            )->addFieldToFilter(
                'increment_id',
                '000000056'
            )->setOrder(
                'created_at',
                'desc'
            );
        }
        

       
        if (!empty($collection)) {
            foreach ($collection as $order1) {
                $orders[] = [
                    "increment_id" => $order1->getIncrementId(),
                    "status" => $order1->getStatus()
                ];
            }
        }

        // echo json_encode($orders);
        return $orders;
    }

    /**
     * @api
     * @param string $order_id
     * @return array
     */
    public function addOrderRefund($order_id){
        // var_dump($this->getRequest()->getParams());

        // $data['bss-option'] = $this->getRequest()->getParams('bss-option');
        // $data['bss-radio'] = $this->getRequest()->getParams('bss-radio');
        // $data['bss-refund-reason'] = $this->getRequest()->getParams('bss-refund-reason');
        // $data['bss-refund-order-id'] = $this->getRequest()->getParams('bss-refund-order-id');

        // echo "OK";
        $model          = $this->requestFactory->create();
        // $data           = $this->getRequest()->getPostValue();

       $rawData = file_get_contents("php://input");
       $rawData = json_decode($rawData);

       $data['bss-option'] = $rawData->option;
       $data['bss-radio'] = $rawData->radio;
       $data['bss-refund-reason'] = $rawData->reason;
       $data['bss-refund-order-id'] = $rawData->id;

        if ($data) {
            if ($this->helper->getConfigEnableDropdown()) {
                $option = $data['bss-option'];
            } else {
                $option = '';
            }
            if ($this->helper->getConfigEnableOption()) {
                $radio = $data['bss-radio'];
            } else {
                $radio = '';
            }
            $reasonComment = $data['bss-refund-reason'];
            $incrementId   = $data['bss-refund-order-id'];
            $orderData     = $this->orderInterface->loadByIncrementId($order_id);

            try {
                $model->setOption($option);
                $model->setRadio($radio);
                $model->setOrderId($incrementId);
                $model->setReasonComment($reasonComment);
                $model->setCustomerName($orderData->getCustomerName());
                $model->setCustomerEmail($orderData->getCustomerEmail());
                $model->save();
             
                try {
                    $this->sendEmail($orderData);

                 
                    $message['status'] = true;
                    $message['message'] =  __('Your refund request number #' . $incrementId . ' has been submited.');
                    return ['OK'];
                    return $message;

                } catch (\Exception $e) {
                    $message['status'] = false;
                    $message['message'] =  $e->getMessage();
                    return ['false',$e->getMessage()];
                    return $message;
                }
            } catch (\Exception $e) {
                $message['status'] = false;
                $message['message'] =  $e->getMessage();
                return $message;
            }
        }else{
            $message['status'] = false;
            $message['message'] =  'No Data';
            return $message;
        }
    }

    /**
     * @param $orderData
     */
    protected function sendEmail($orderData)
    {
        $emailTemplate = $this->helper->getEmailTemplate();
        $adminEmail    = $this->helper->getAdminEmail();
        $adminEmails   = explode(",", $adminEmail);
        $countEmail    = count($adminEmails);
        if ($countEmail > 1) {
            foreach ($adminEmails as $value) {
                $value             = str_replace(' ', '', $value);
                $emailTemplateData = [
                    'adminEmail'   => $value,
                    'incrementId'  => $orderData->getIncrementId(),
                    'customerName' => $orderData->getCustomerName(),
                    'createdAt'    => $orderData->getCreatedAt(),
                ];
                $this->emailSender->sendEmail($value, $emailTemplate, $emailTemplateData);
            }
        } else {
            $emailTemplateData = [
                'adminEmail'   => $adminEmail,
                'incrementId'  => $orderData->getIncrementId(),
                'customerName' => $orderData->getCustomerName(),
                'createdAt'    => $orderData->getCreatedAt(),
            ];
            $this->emailSender->sendEmail($adminEmail, $emailTemplate, $emailTemplateData);
        }
    }

    /**
     *  @param string $refund_status = 'accept' | 'rejected'
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function changeOrderStatus($refund_status)
    {
        if($refund_status == 'accept' || $refund_status == 'rejected'){
            if ($this->helper->getConfigEnableModule()) {
                $acceptOrder = 0;
                $incrementIds = [];
                $collection = $this->getRequest()->getParam('order_id');
                $incrementIds[0] = $collection;
    
                try{
                    $orderData     = $this->orderInterface->loadByIncrementId($collection);
                    if($refund_status == 'rejected'){
                        $this->statusResourceModel->updateOrderRefundStatus($incrementIds, self::STATUS_REJECT);
                        $this->statusResourceModel->updateStatusAndTime($incrementIds, self::STATUS_REJECT);
                        $this->sendEmailAccept($orderData);
                    }else{
                        $this->statusResourceModel->updateOrderRefundStatus($incrementIds, self::STATUS_ACCEPT);
                        $this->statusResourceModel->updateStatusAndTime($incrementIds, self::STATUS_ACCEPT);
                        $this->sendEmailReject($orderData);
                    }
                    
    
                    $message['status'] = true;
                    $message['message'] =  'Status Update Successfully';
                    return $message;
                }
                catch (\Exception $e) {
                    $message['status'] = false;
                    $message['message'] =  $e->getMessage();
                    return $message;
                }
    
    
            } else {
                $message['status'] = false;
                $message['message'] =  'Module is Disabled';
                return $message;
            }

        }else{
            $message['status'] = false;
            $message['message'] =  'Valid Status are Only accept|reject';
            return $message;
        }
        return true;
    }

    /**
     * @param $timezoneValue
     * @return string
     */
    protected function getTimezoneLabelByValue($timezoneValue)
    {
        $timezones = $this->localeLists->getOptionTimezones();
        $label = '';
        foreach ($timezones as $zone) {
            if ($zone["value"] == $timezoneValue) {
                $label = $zone["label"];
            }
        }
        return $label;
    }
    /**
     * @param $item
     */
    protected function sendEmailAccept($item)
    {
        $customerEmail = $item->getCustomerEmail();
        $timezone = $this->scopeConfig->getValue('general/locale/timezone', \Magento\Store\Model\
        ScopeInterface::SCOPE_STORE);
        $date = $this->timezone->date();
        $timezoneLabel = $this->getTimezoneLabelByValue($timezone);
        $date = $date->format('Y-m-d h:i:s A')." ".$timezoneLabel;
        $emailTemplate = $this->helper->getAcceptEmailTemplate();
        $emailTemplateData = [
            'incrementId' => $item["increment_id"],
            'id' => $item["id"],
            'timeApproved'=> $date,
            'customerName' => $item["customer_name"]
        ];
        $this->emailSender->sendEmail($customerEmail, $emailTemplate, $emailTemplateData);
    }

    /**
     * @param $item
     */
    protected function sendEmailReject($item)
    {
        $customerEmail = $item->getCustomerEmail();
        $timezone = $this->scopeConfig->getValue('general/locale/timezone', \Magento\Store\Model\
        ScopeInterface::SCOPE_STORE);
        $date = $this->timezone->date();
        $timezoneLabel = $this->getTimezoneLabelByValue($timezone);
        $date = $date->format('Y-m-d h:i:s A') . " " . $timezoneLabel;
        $emailTemplate = $this->helper->getRejectEmailTemplate();
        $emailTemplateData = [
            'incrementId' => $item["increment_id"],
            'id' => $item["id"],
            'timeApproved'=> $date,
            'customerName' => $item["customer_name"]
        ];
        $this->emailSender->sendEmail($customerEmail, $emailTemplate, $emailTemplateData);
    }

    /**
     * @api
     * @return array
    */
    public function getAllRequests(){
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('bss_refundrequest');

        $sql = "SELECT * FROM " . $tableName;
        $result = $connection->fetchAll($sql); 
        if($result){
            return $result;
        }else{
             return [];
        }

        return [];
    }
}
