<?php
namespace Magento\Webapi\Controller\Rest\Router;

/**
 * Interceptor class for @see \Magento\Webapi\Controller\Rest\Router
 */
class Interceptor extends \Magento\Webapi\Controller\Rest\Router implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Webapi\Model\Rest\Config $apiConfig)
    {
        $this->___init();
        parent::__construct($apiConfig);
    }

    /**
     * {@inheritdoc}
     */
    public function match(\Magento\Framework\Webapi\Rest\Request $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'match');
        return $pluginInfo ? $this->___callPlugins('match', func_get_args(), $pluginInfo) : parent::match($request);
    }
}
