<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace MMA\CustomApi\Model\Braintree\Ui;;

use MMA\CustomApi\Api\BraintreeConfigProviderInterface;

/**
 * Class ConfigProvider
 */
class ConfigProvider implements BraintreeConfigProviderInterface
{

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig(){

    }

    /**
     * Generate a new client token if necessary
     * @return string
     */
    public function getClientToken(){

    }
}
