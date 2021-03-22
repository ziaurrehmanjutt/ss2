<?php

namespace Iib\EasyPaisa\Block\Info;

class EasyPayment extends \Magento\Payment\Block\Info
{
    /**
     * @var string
     */
    protected $_template = 'Iib_EasyPaisa::info/easypayment.phtml';

    /**
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('Iib_EasyPaisa::info/pdf/easypayment.phtml');
        return $this->toHtml();
    }
}
