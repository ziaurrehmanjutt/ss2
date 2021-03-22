
define([
    'uiComponent',
    'Magento_Checkout/js/model/payment/renderer-list'
], function (Component, rendererList) {
    'use strict';

    rendererList.push(
        {
            type: 'easypayment',
            component: 'Iib_EasyPaisa/js/view/payment/method-renderer/easypayment-method'
        }
    );

    /** Add view logic here if needed */
    return Component.extend({});
});
