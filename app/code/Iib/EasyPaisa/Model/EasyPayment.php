<?php


namespace Iib\EasyPaisa\Model;

use Magento\Quote\Api\Data\PaymentInterface;

class EasyPayment extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_PDQPAYMENT_CODE = 'easypayment';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_PDQPAYMENT_CODE;

    /**
     * @var string
     */
    protected $_formBlockType = \Iib\EasyPaisa\Block\Form\EasyPayment::class;

    /**
     * @var string
     */
    protected $_infoBlockType = \Iib\EasyPaisa\Block\Info\EasyPayment::class;

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;
}
