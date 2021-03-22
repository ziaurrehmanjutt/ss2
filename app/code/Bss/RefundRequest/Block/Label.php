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
namespace Bss\RefundRequest\Block;

use Bss\RefundRequest\Model\ResourceModel\Request\CollectionFactory;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Sales\Block\Order\History;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollection;

class Label extends Template
{
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
     * Label constructor.
     * @param \Bss\RefundRequest\Helper\Data $helper
     * @param History $history
     * @param \Bss\RefundRequest\Model\ResourceModel\Label\CollectionFactory $collectionFactory
     * @param CollectionFactory $requestCollectionFactory
     * @param OrderCollection $orderCollectionFactory
     * @param Context $context
     * @param CustomerSession $customerSession
     * @param array $data
     */
    public function __construct(
        \Bss\RefundRequest\Helper\Data $helper,
        History $history,
        \Bss\RefundRequest\Model\ResourceModel\Label\CollectionFactory $collectionFactory,
        CollectionFactory $requestCollectionFactory,
        OrderCollection $orderCollectionFactory,
        Context $context,
        CustomerSession $customerSession,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->requestCollectionFactory = $requestCollectionFactory;
        $this->history = $history;
        $this->collectionFactory = $collectionFactory;
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->formKey = $context->getFormKey();
        parent::__construct($context, $data);
        $this->context = $context;
        $this->data = $data;
        $this->customerSession = $customerSession;
    }

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
     * @return array
     */
    public function getOrderCollectionByCustomerId()
    {
        $customerId = $this->customerSession->getCustomer()->getId();
        $collection = $orders = [];

        if ($customerId) {
            $collection = $this->orderCollectionFactory->create()->addFieldToSelect(
                '*'
            )->addFieldToFilter(
                'customer_id',
                $customerId
            )->setOrder(
                'created_at',
                'desc'
            );
        }

        if (!empty($collection)) {
            foreach ($collection as $order) {
                $orders[] = [
                    "increment_id" => $order->getIncrementId(),
                    "status" => $order->getStatus()
                ];
            }
        }

        return $orders;
    }

        /**
     * @return array
     */
    public function getOrderCollectionByCustomerIdApi()
    {
        $customerId = $this->customerSession->getCustomer()->getId();
        $collection = $orders = [];

        $orders['cusm'] = $this->customerSession->getCustomer()->getId();
        if ($customerId) {
            $collection = $this->orderCollectionFactory->create()->addFieldToSelect(
                '*'
            )->addFieldToFilter(
                'customer_id',
                $customerId
            )->setOrder(
                'created_at',
                'desc'
            );
        }

        if (!empty($collection)) {
            foreach ($collection as $order) {
                $orders[] = [
                    "increment_id" => $order->getIncrementId(),
                    "status" => $order->getStatus()
                ];
            }
        }

        return $orders;
    }

    /**
     * @api
     * @param string $customer_id
     * @return array
     */
    public function getOrderCollectionByCustomerIdApi2($customer_id)
    {
        $customerId = $this->customerSession->getCustomer()->getId();
        $collection = $orders = [];

        $orders['cusm'] = $_SESSION;
        if ($customerId) {
            $collection = $this->orderCollectionFactory->create()->addFieldToSelect(
                '*'
            )->addFieldToFilter(
                'customer_id',
                $customerId
            )->setOrder(
                'created_at',
                'desc'
            );
        }

        if (!empty($collection)) {
            foreach ($collection as $order) {
                $orders[] = [
                    "increment_id" => $order->getIncrementId(),
                    "status" => $order->getStatus()
                ];
            }
        }

        echo json_encode($orders);
        return $orders;
    }
}
