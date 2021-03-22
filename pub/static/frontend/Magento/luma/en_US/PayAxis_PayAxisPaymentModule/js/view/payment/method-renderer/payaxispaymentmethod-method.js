/*browser:true*/
/*global define*/
define(
[
    'jquery',
    'Magento_Checkout/js/view/payment/default',
    'Magento_Checkout/js/action/place-order',
    'Magento_Checkout/js/action/select-payment-method',
    'Magento_Customer/js/model/customer',
    'Magento_Checkout/js/checkout-data',
    'Magento_Checkout/js/model/payment/additional-validators',
    'mage/url',
],
function (
    $,
    Component,
    placeOrderAction,
    selectPaymentMethodAction,
    customer,
    checkoutData,
    additionalValidators,
    url) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'PayAxis_PayAxisPaymentModule/payment/payaxispaymentmethod'
        },

        placeOrder: function (data, event) {
            if (event) {
                event.preventDefault();
            }
            var self = this,
                placeOrder,
                emailValidationResult = customer.isLoggedIn(),
                loginFormSelector = 'form[data-role=email-with-possible-login]';
            if (!customer.isLoggedIn()) {
                $(loginFormSelector).validation();
                emailValidationResult = Boolean($(loginFormSelector + ' input[name=username]').valid());
            }
            if (emailValidationResult && this.validate() && additionalValidators.validate()) {
                this.isPlaceOrderActionAllowed(false);
                placeOrder = placeOrderAction(this.getData(), false, this.messageContainer);
                   $.when(placeOrder).fail(function () {
                    self.isPlaceOrderActionAllowed(true);
                }).done(this.afterPlaceOrder.bind(this));
                return true;
            }
            return false;
        },

        selectPaymentMethod: function() {
            selectPaymentMethodAction(this.getData());
            checkoutData.setSelectedPaymentMethod(this.item.method);
            return true;
        },

        afterPlaceOrder: function () {
            window.location.replace(url.build('payaxis/index/index'));
         
            //document.body.innerHTML += '<form id="dynForm" action="http://119.160.80.70/PayAxisCustomerPortal/transactionmanagement/merchantform" method="post"><input type="hidden" name="pp_Version" value="1.1" /><input type="hidden" name="pp_TxnType" value="" /><input type="hidden" name="pp_Language" value="EN" /><input type="hidden" name="pp_MerchantID" value="test00127801" /><input type="hidden" name="pp_SubMerchantID" value="" /><input type="hidden" name="pp_Password" value="0123456789" /><input type="hidden" name="pp_BankID" value="" /><input type="hidden" name="pp_ProductID" value="" /><input type="hidden" name="pp_TxnRefNo" value="012322243" /><input type="hidden" name="pp_Amount" value="120000" /> <input type="hidden" name="pp_TxnCurrency" value="PKR" /><input type="hidden" name="pp_TxnDateTime" value="20160816000000" /><input type="hidden" name="pp_BillReference" value="" /><input type="hidden" name="pp_Description" value="abc" /><input type="hidden" name="pp_TxnExpiryDateTime" value="20160821000000" /><input type="hidden" name="pp_ReturnURL" value="http://127.0.0.1/magento/checkout/onepage/success/" /><input type="hidden" name="pp_SecureHash" value="" /><input type="hidden" name="ppmpf_1" value="1" /><input type="hidden" name="ppmpf_2" value="2" /><input type="hidden" name="ppmpf_3" value="3" /><input type="hidden" name="ppmpf_4" value="4" /><input type="hidden" name="ppmpf_5" value="5" /></form>';         
            //document.getElementById("dynForm").submit();
        }
  
    });
}
)