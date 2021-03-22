<?php
namespace Mageplaza\TwoFactorAuth\Model\Auth;

/**
 * Interceptor class for @see \Mageplaza\TwoFactorAuth\Model\Auth
 */
class Interceptor extends \Mageplaza\TwoFactorAuth\Model\Auth implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Event\ManagerInterface $eventManager, \Magento\Backend\Helper\Data $backendData, \Magento\Backend\Model\Auth\StorageInterface $authStorage, \Magento\Backend\Model\Auth\Credential\StorageInterface $credentialStorage, \Magento\Framework\App\Config\ScopeConfigInterface $coreConfig, \Magento\Framework\Data\Collection\ModelFactory $modelFactory, \Magento\Framework\HTTP\PhpEnvironment\Request $request, \Magento\Framework\Stdlib\DateTime\DateTime $dateTime, \Magento\Framework\UrlInterface $url, \Magento\Framework\App\ResponseInterface $response, \Magento\Framework\Session\SessionManager $storageSession, \Magento\Framework\App\ActionFlag $actionFlag, \Mageplaza\TwoFactorAuth\Helper\Data $helperData, \Mageplaza\TwoFactorAuth\Model\TrustedFactory $trustedFactory)
    {
        $this->___init();
        parent::__construct($eventManager, $backendData, $authStorage, $credentialStorage, $coreConfig, $modelFactory, $request, $dateTime, $url, $response, $storageSession, $actionFlag, $helperData, $trustedFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function login($username, $password)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'login');
        return $pluginInfo ? $this->___callPlugins('login', func_get_args(), $pluginInfo) : parent::login($username, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function setAuthStorage($storage)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAuthStorage');
        return $pluginInfo ? $this->___callPlugins('setAuthStorage', func_get_args(), $pluginInfo) : parent::setAuthStorage($storage);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthStorage()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAuthStorage');
        return $pluginInfo ? $this->___callPlugins('getAuthStorage', func_get_args(), $pluginInfo) : parent::getAuthStorage();
    }

    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUser');
        return $pluginInfo ? $this->___callPlugins('getUser', func_get_args(), $pluginInfo) : parent::getUser();
    }

    /**
     * {@inheritdoc}
     */
    public function getCredentialStorage()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCredentialStorage');
        return $pluginInfo ? $this->___callPlugins('getCredentialStorage', func_get_args(), $pluginInfo) : parent::getCredentialStorage();
    }

    /**
     * {@inheritdoc}
     */
    public function logout()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'logout');
        return $pluginInfo ? $this->___callPlugins('logout', func_get_args(), $pluginInfo) : parent::logout();
    }

    /**
     * {@inheritdoc}
     */
    public function isLoggedIn()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isLoggedIn');
        return $pluginInfo ? $this->___callPlugins('isLoggedIn', func_get_args(), $pluginInfo) : parent::isLoggedIn();
    }
}
