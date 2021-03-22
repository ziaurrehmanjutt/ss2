<?php

namespace Iib\EasyPaisa\Block\Form;

class EasyPayment extends \Magento\Payment\Block\Form
{
    /**
     * PDQ Payment template
     * This is used for both frontend and backend
     * I created two files named pdqpayment.phtml in the path view\adminhtml\templates\form and view\frontend\templates\form because it has different content.
     *
     * @var string
     */
    protected $_template = 'Iib_EasyPaisa::form/easypayment.phtml';
}
