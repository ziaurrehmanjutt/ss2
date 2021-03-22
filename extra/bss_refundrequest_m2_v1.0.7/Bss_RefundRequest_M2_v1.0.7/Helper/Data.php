<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_RefundRequest
 * @author     Extension Team
 * @copyright  Copyright (c) 2017-2018 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Bss\RefundRequest\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * Config for enable module
     * BSS_CONFIG_ENABLE_MODULE
     */
    const BSS_CONFIG_ENABLE_MODULE = 'bss_refundrequest/bss_refundrequest_general/enable';

    /**
     * Config for order refund
     * BSS_CONFIG_ORDER_REFUND
     */
    const BSS_CONFIG_ORDER_REFUND = 'bss_refundrequest/bss_refundrequest_general/canrefund';

    /**
     * Config for title popup
     * BSS_CONFIG_TITLE_POPUP
     */
    const BSS_CONFIG_POPUP_TITLE = 'bss_refundrequest/bss_refundrequest_config/popup_title';

    /**
     * Config for enable dropdown
     * BSS_CONFIG_ENABLE_DROPDOWN
     */
    const BSS_CONFIG_ENABLE_DROPDOWN = 'bss_refundrequest/bss_refundrequest_config/enable_dropdown';

    /**
     * Config for dropdown title
     * BSS_CONFIG_DROPDOWN_TITLE
     */
    const BSS_CONFIG_DROPDOWN_TITLE = 'bss_refundrequest/bss_refundrequest_config/dropdown_title';

    /**
     * Config for enable option
     * BSS_CONFIG_ENABLE_OPTION
     */
    const BSS_CONFIG_ENABLE_OPTION = 'bss_refundrequest/bss_refundrequest_config/enable_option';

    /**
     * Config for option title
     * BSS_CONFIG_OPTION_TITLE
     */
    const BSS_CONFIG_OPTION_TITLE = 'bss_refundrequest/bss_refundrequest_config/option_title';

    /**
     * Config for detail title
     * BSS_CONFIG_DETAIL_TITLE
     */
    const BSS_CONFIG_DETAIL_TITLE = 'bss_refundrequest/bss_refundrequest_config/detail_title';

    /**
     * Config for config title
     * BSS_CONFIG_TITLE
     */
    const BSS_CONFIG_POPUP_DESCRIPTION = 'bss_refundrequest/bss_refundrequest_config/popup_description';

    /**
     * Config for admin email
     * BSS_CONFIG_ADMIN_EMAIL
     */
    const BSS_CONFIG_ADMIN_EMAIL = 'bss_refundrequest/bss_refundrequest_email_config/admin_email';

    /**
     * Config for email template
     * BSS_CONFIG_EMAIL_TEMPLATE
     */
    const BSS_CONFIG_EMAIL_TEMPLATE = 'bss_refundrequest/bss_refundrequest_email_config/email_template';

    /**
     * Config for email sender
     * BSS_CONFIG_EMAIL_SENDER
     */
    const BSS_CONFIG_EMAIL_SENDER = 'bss_refundrequest/bss_refundrequest_email_config/email_sender';

    /**
     * Config for accept email
     * BSS_CONFIG_ACCEPT_EMAIL
     */
    const BSS_CONFIG_ACCEPT_EMAIL = 'bss_refundrequest/bss_refundrequest_email_config/accept_email';

    /**
     * Config for reject email
     * BSS_CONFIG_REJECT_EMAIL
     */
    const BSS_CONFIG_REJECT_EMAIL = 'bss_refundrequest/bss_refundrequest_email_config/reject_email';

    /**
     * ScopeConfigInterface
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
        $this->scopeConfig = $context->getScopeConfig();
    }

    //General config admin

    /**
     * Get Config Enable Module
     *
     * @return string
     */
    public function getConfigEnableModule()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_ENABLE_MODULE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getOrderRefund()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_ORDER_REFUND,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Get Config Title Module
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_POPUP_DESCRIPTION,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Get Config Title Module
     *
     * @return string
     */
    public function getPopupModuleTitle()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_POPUP_TITLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Get Config Enable Dropdown In Modal Popup
     *
     * @return string
     */
    public function getConfigEnableDropdown()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_ENABLE_DROPDOWN,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Get Config Title Dropdown Modal Popup
     *
     * @return string
     */
    public function getDropdownTitle()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_DROPDOWN_TITLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Get Config Enable Yes/No Option
     *
     * @return string
     */
    public function getConfigEnableOption()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_ENABLE_OPTION,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Get Config Title Yes/No Option
     *
     * @return string
     */
    public function getOptionTitle()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_OPTION_TITLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    /**
     * Get Config
     *
     * @return string
     */
    public function getDetailTitle()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_DETAIL_TITLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAdminEmail()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_ADMIN_EMAIL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getEmailTemplate()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_EMAIL_TEMPLATE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function configSenderEmail()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_EMAIL_SENDER,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getRejectEmailTemplate()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_REJECT_EMAIL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAcceptEmailTemplate()
    {
        return $this->scopeConfig->getValue(
            self::BSS_CONFIG_ACCEPT_EMAIL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

}
