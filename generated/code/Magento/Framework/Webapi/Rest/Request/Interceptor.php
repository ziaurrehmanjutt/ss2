<?php
namespace Magento\Framework\Webapi\Rest\Request;

/**
 * Interceptor class for @see \Magento\Framework\Webapi\Rest\Request
 */
class Interceptor extends \Magento\Framework\Webapi\Rest\Request implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Stdlib\Cookie\CookieReaderInterface $cookieReader, \Magento\Framework\Stdlib\StringUtils $converter, \Magento\Framework\App\AreaList $areaList, \Magento\Framework\Config\ScopeInterface $configScope, \Magento\Framework\Webapi\Rest\Request\DeserializerFactory $deserializerFactory, $uri = null)
    {
        $this->___init();
        parent::__construct($cookieReader, $converter, $areaList, $configScope, $deserializerFactory, $uri);
    }

    /**
     * {@inheritdoc}
     */
    public function getAcceptTypes()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAcceptTypes');
        return $pluginInfo ? $this->___callPlugins('getAcceptTypes', func_get_args(), $pluginInfo) : parent::getAcceptTypes();
    }

    /**
     * {@inheritdoc}
     */
    public function getBodyParams()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBodyParams');
        return $pluginInfo ? $this->___callPlugins('getBodyParams', func_get_args(), $pluginInfo) : parent::getBodyParams();
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getContentType');
        return $pluginInfo ? $this->___callPlugins('getContentType', func_get_args(), $pluginInfo) : parent::getContentType();
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpMethod()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHttpMethod');
        return $pluginInfo ? $this->___callPlugins('getHttpMethod', func_get_args(), $pluginInfo) : parent::getHttpMethod();
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestData()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRequestData');
        return $pluginInfo ? $this->___callPlugins('getRequestData', func_get_args(), $pluginInfo) : parent::getRequestData();
    }

    /**
     * {@inheritdoc}
     */
    public function getHeader($header, $default = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHeader');
        return $pluginInfo ? $this->___callPlugins('getHeader', func_get_args(), $pluginInfo) : parent::getHeader($header, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestedServices($default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRequestedServices');
        return $pluginInfo ? $this->___callPlugins('getRequestedServices', func_get_args(), $pluginInfo) : parent::getRequestedServices($default);
    }

    /**
     * {@inheritdoc}
     */
    public function getModuleName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getModuleName');
        return $pluginInfo ? $this->___callPlugins('getModuleName', func_get_args(), $pluginInfo) : parent::getModuleName();
    }

    /**
     * {@inheritdoc}
     */
    public function setModuleName($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setModuleName');
        return $pluginInfo ? $this->___callPlugins('setModuleName', func_get_args(), $pluginInfo) : parent::setModuleName($value);
    }

    /**
     * {@inheritdoc}
     */
    public function getControllerName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getControllerName');
        return $pluginInfo ? $this->___callPlugins('getControllerName', func_get_args(), $pluginInfo) : parent::getControllerName();
    }

    /**
     * {@inheritdoc}
     */
    public function setControllerName($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setControllerName');
        return $pluginInfo ? $this->___callPlugins('setControllerName', func_get_args(), $pluginInfo) : parent::setControllerName($value);
    }

    /**
     * {@inheritdoc}
     */
    public function getActionName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getActionName');
        return $pluginInfo ? $this->___callPlugins('getActionName', func_get_args(), $pluginInfo) : parent::getActionName();
    }

    /**
     * {@inheritdoc}
     */
    public function setActionName($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setActionName');
        return $pluginInfo ? $this->___callPlugins('setActionName', func_get_args(), $pluginInfo) : parent::setActionName($value);
    }

    /**
     * {@inheritdoc}
     */
    public function getPathInfo()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPathInfo');
        return $pluginInfo ? $this->___callPlugins('getPathInfo', func_get_args(), $pluginInfo) : parent::getPathInfo();
    }

    /**
     * {@inheritdoc}
     */
    public function setPathInfo($pathInfo = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setPathInfo');
        return $pluginInfo ? $this->___callPlugins('setPathInfo', func_get_args(), $pluginInfo) : parent::setPathInfo($pathInfo);
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestString()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRequestString');
        return $pluginInfo ? $this->___callPlugins('getRequestString', func_get_args(), $pluginInfo) : parent::getRequestString();
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias($name)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAlias');
        return $pluginInfo ? $this->___callPlugins('getAlias', func_get_args(), $pluginInfo) : parent::getAlias($name);
    }

    /**
     * {@inheritdoc}
     */
    public function setAlias($name, $target)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAlias');
        return $pluginInfo ? $this->___callPlugins('setAlias', func_get_args(), $pluginInfo) : parent::setAlias($name, $target);
    }

    /**
     * {@inheritdoc}
     */
    public function getParam($key, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getParam');
        return $pluginInfo ? $this->___callPlugins('getParam', func_get_args(), $pluginInfo) : parent::getParam($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setParam($key, $value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setParam');
        return $pluginInfo ? $this->___callPlugins('setParam', func_get_args(), $pluginInfo) : parent::setParam($key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getParams');
        return $pluginInfo ? $this->___callPlugins('getParams', func_get_args(), $pluginInfo) : parent::getParams();
    }

    /**
     * {@inheritdoc}
     */
    public function setParams(array $array)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setParams');
        return $pluginInfo ? $this->___callPlugins('setParams', func_get_args(), $pluginInfo) : parent::setParams($array);
    }

    /**
     * {@inheritdoc}
     */
    public function clearParams()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'clearParams');
        return $pluginInfo ? $this->___callPlugins('clearParams', func_get_args(), $pluginInfo) : parent::clearParams();
    }

    /**
     * {@inheritdoc}
     */
    public function getScheme()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getScheme');
        return $pluginInfo ? $this->___callPlugins('getScheme', func_get_args(), $pluginInfo) : parent::getScheme();
    }

    /**
     * {@inheritdoc}
     */
    public function setDispatched($flag = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDispatched');
        return $pluginInfo ? $this->___callPlugins('setDispatched', func_get_args(), $pluginInfo) : parent::setDispatched($flag);
    }

    /**
     * {@inheritdoc}
     */
    public function isDispatched()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isDispatched');
        return $pluginInfo ? $this->___callPlugins('isDispatched', func_get_args(), $pluginInfo) : parent::isDispatched();
    }

    /**
     * {@inheritdoc}
     */
    public function isSecure()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isSecure');
        return $pluginInfo ? $this->___callPlugins('isSecure', func_get_args(), $pluginInfo) : parent::isSecure();
    }

    /**
     * {@inheritdoc}
     */
    public function getCookie($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCookie');
        return $pluginInfo ? $this->___callPlugins('getCookie', func_get_args(), $pluginInfo) : parent::getCookie($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function getServerValue($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getServerValue');
        return $pluginInfo ? $this->___callPlugins('getServerValue', func_get_args(), $pluginInfo) : parent::getServerValue($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryValue($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getQueryValue');
        return $pluginInfo ? $this->___callPlugins('getQueryValue', func_get_args(), $pluginInfo) : parent::getQueryValue($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setQueryValue($name, $value = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setQueryValue');
        return $pluginInfo ? $this->___callPlugins('setQueryValue', func_get_args(), $pluginInfo) : parent::setQueryValue($name, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getPostValue($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPostValue');
        return $pluginInfo ? $this->___callPlugins('getPostValue', func_get_args(), $pluginInfo) : parent::getPostValue($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setPostValue($name, $value = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setPostValue');
        return $pluginInfo ? $this->___callPlugins('setPostValue', func_get_args(), $pluginInfo) : parent::setPostValue($name, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function __get($key)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, '__get');
        return $pluginInfo ? $this->___callPlugins('__get', func_get_args(), $pluginInfo) : parent::__get($key);
    }

    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'get');
        return $pluginInfo ? $this->___callPlugins('get', func_get_args(), $pluginInfo) : parent::get($key);
    }

    /**
     * {@inheritdoc}
     */
    public function __isset($key)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, '__isset');
        return $pluginInfo ? $this->___callPlugins('__isset', func_get_args(), $pluginInfo) : parent::__isset($key);
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'has');
        return $pluginInfo ? $this->___callPlugins('has', func_get_args(), $pluginInfo) : parent::has($key);
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpHost($trimPort = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHttpHost');
        return $pluginInfo ? $this->___callPlugins('getHttpHost', func_get_args(), $pluginInfo) : parent::getHttpHost($trimPort);
    }

    /**
     * {@inheritdoc}
     */
    public function getClientIp($checkProxy = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getClientIp');
        return $pluginInfo ? $this->___callPlugins('getClientIp', func_get_args(), $pluginInfo) : parent::getClientIp($checkProxy);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserParams()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUserParams');
        return $pluginInfo ? $this->___callPlugins('getUserParams', func_get_args(), $pluginInfo) : parent::getUserParams();
    }

    /**
     * {@inheritdoc}
     */
    public function getUserParam($key, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUserParam');
        return $pluginInfo ? $this->___callPlugins('getUserParam', func_get_args(), $pluginInfo) : parent::getUserParam($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setRequestUri($requestUri = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setRequestUri');
        return $pluginInfo ? $this->___callPlugins('setRequestUri', func_get_args(), $pluginInfo) : parent::setRequestUri($requestUri);
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUrl()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseUrl');
        return $pluginInfo ? $this->___callPlugins('getBaseUrl', func_get_args(), $pluginInfo) : parent::getBaseUrl();
    }

    /**
     * {@inheritdoc}
     */
    public function isForwarded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isForwarded');
        return $pluginInfo ? $this->___callPlugins('isForwarded', func_get_args(), $pluginInfo) : parent::isForwarded();
    }

    /**
     * {@inheritdoc}
     */
    public function setForwarded($forwarded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setForwarded');
        return $pluginInfo ? $this->___callPlugins('setForwarded', func_get_args(), $pluginInfo) : parent::setForwarded($forwarded);
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getContent');
        return $pluginInfo ? $this->___callPlugins('getContent', func_get_args(), $pluginInfo) : parent::getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function setCookies($cookie)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCookies');
        return $pluginInfo ? $this->___callPlugins('setCookies', func_get_args(), $pluginInfo) : parent::setCookies($cookie);
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestUri()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRequestUri');
        return $pluginInfo ? $this->___callPlugins('getRequestUri', func_get_args(), $pluginInfo) : parent::getRequestUri();
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseUrl($baseUrl)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseUrl');
        return $pluginInfo ? $this->___callPlugins('setBaseUrl', func_get_args(), $pluginInfo) : parent::setBaseUrl($baseUrl);
    }

    /**
     * {@inheritdoc}
     */
    public function setBasePath($basePath)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBasePath');
        return $pluginInfo ? $this->___callPlugins('setBasePath', func_get_args(), $pluginInfo) : parent::setBasePath($basePath);
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBasePath');
        return $pluginInfo ? $this->___callPlugins('getBasePath', func_get_args(), $pluginInfo) : parent::getBasePath();
    }

    /**
     * {@inheritdoc}
     */
    public function setServer(\Laminas\Stdlib\ParametersInterface $server)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setServer');
        return $pluginInfo ? $this->___callPlugins('setServer', func_get_args(), $pluginInfo) : parent::setServer($server);
    }

    /**
     * {@inheritdoc}
     */
    public function getServer($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getServer');
        return $pluginInfo ? $this->___callPlugins('getServer', func_get_args(), $pluginInfo) : parent::getServer($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setEnv(\Laminas\Stdlib\ParametersInterface $env)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setEnv');
        return $pluginInfo ? $this->___callPlugins('setEnv', func_get_args(), $pluginInfo) : parent::setEnv($env);
    }

    /**
     * {@inheritdoc}
     */
    public function getEnv($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEnv');
        return $pluginInfo ? $this->___callPlugins('getEnv', func_get_args(), $pluginInfo) : parent::getEnv($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setMethod($method)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setMethod');
        return $pluginInfo ? $this->___callPlugins('setMethod', func_get_args(), $pluginInfo) : parent::setMethod($method);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMethod');
        return $pluginInfo ? $this->___callPlugins('getMethod', func_get_args(), $pluginInfo) : parent::getMethod();
    }

    /**
     * {@inheritdoc}
     */
    public function setUri($uri)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setUri');
        return $pluginInfo ? $this->___callPlugins('setUri', func_get_args(), $pluginInfo) : parent::setUri($uri);
    }

    /**
     * {@inheritdoc}
     */
    public function getUri()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUri');
        return $pluginInfo ? $this->___callPlugins('getUri', func_get_args(), $pluginInfo) : parent::getUri();
    }

    /**
     * {@inheritdoc}
     */
    public function getUriString()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUriString');
        return $pluginInfo ? $this->___callPlugins('getUriString', func_get_args(), $pluginInfo) : parent::getUriString();
    }

    /**
     * {@inheritdoc}
     */
    public function setQuery(\Laminas\Stdlib\ParametersInterface $query)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setQuery');
        return $pluginInfo ? $this->___callPlugins('setQuery', func_get_args(), $pluginInfo) : parent::setQuery($query);
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getQuery');
        return $pluginInfo ? $this->___callPlugins('getQuery', func_get_args(), $pluginInfo) : parent::getQuery($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setPost(\Laminas\Stdlib\ParametersInterface $post)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setPost');
        return $pluginInfo ? $this->___callPlugins('setPost', func_get_args(), $pluginInfo) : parent::setPost($post);
    }

    /**
     * {@inheritdoc}
     */
    public function getPost($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPost');
        return $pluginInfo ? $this->___callPlugins('getPost', func_get_args(), $pluginInfo) : parent::getPost($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setFiles(\Laminas\Stdlib\ParametersInterface $files)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setFiles');
        return $pluginInfo ? $this->___callPlugins('setFiles', func_get_args(), $pluginInfo) : parent::setFiles($files);
    }

    /**
     * {@inheritdoc}
     */
    public function getFiles($name = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getFiles');
        return $pluginInfo ? $this->___callPlugins('getFiles', func_get_args(), $pluginInfo) : parent::getFiles($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders($name = null, $default = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHeaders');
        return $pluginInfo ? $this->___callPlugins('getHeaders', func_get_args(), $pluginInfo) : parent::getHeaders($name, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function isOptions()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isOptions');
        return $pluginInfo ? $this->___callPlugins('isOptions', func_get_args(), $pluginInfo) : parent::isOptions();
    }

    /**
     * {@inheritdoc}
     */
    public function isPropFind()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isPropFind');
        return $pluginInfo ? $this->___callPlugins('isPropFind', func_get_args(), $pluginInfo) : parent::isPropFind();
    }

    /**
     * {@inheritdoc}
     */
    public function isGet()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isGet');
        return $pluginInfo ? $this->___callPlugins('isGet', func_get_args(), $pluginInfo) : parent::isGet();
    }

    /**
     * {@inheritdoc}
     */
    public function isHead()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isHead');
        return $pluginInfo ? $this->___callPlugins('isHead', func_get_args(), $pluginInfo) : parent::isHead();
    }

    /**
     * {@inheritdoc}
     */
    public function isPost()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isPost');
        return $pluginInfo ? $this->___callPlugins('isPost', func_get_args(), $pluginInfo) : parent::isPost();
    }

    /**
     * {@inheritdoc}
     */
    public function isPut()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isPut');
        return $pluginInfo ? $this->___callPlugins('isPut', func_get_args(), $pluginInfo) : parent::isPut();
    }

    /**
     * {@inheritdoc}
     */
    public function isDelete()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isDelete');
        return $pluginInfo ? $this->___callPlugins('isDelete', func_get_args(), $pluginInfo) : parent::isDelete();
    }

    /**
     * {@inheritdoc}
     */
    public function isTrace()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isTrace');
        return $pluginInfo ? $this->___callPlugins('isTrace', func_get_args(), $pluginInfo) : parent::isTrace();
    }

    /**
     * {@inheritdoc}
     */
    public function isConnect()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isConnect');
        return $pluginInfo ? $this->___callPlugins('isConnect', func_get_args(), $pluginInfo) : parent::isConnect();
    }

    /**
     * {@inheritdoc}
     */
    public function isPatch()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isPatch');
        return $pluginInfo ? $this->___callPlugins('isPatch', func_get_args(), $pluginInfo) : parent::isPatch();
    }

    /**
     * {@inheritdoc}
     */
    public function isXmlHttpRequest()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isXmlHttpRequest');
        return $pluginInfo ? $this->___callPlugins('isXmlHttpRequest', func_get_args(), $pluginInfo) : parent::isXmlHttpRequest();
    }

    /**
     * {@inheritdoc}
     */
    public function isFlashRequest()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isFlashRequest');
        return $pluginInfo ? $this->___callPlugins('isFlashRequest', func_get_args(), $pluginInfo) : parent::isFlashRequest();
    }

    /**
     * {@inheritdoc}
     */
    public function renderRequestLine()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'renderRequestLine');
        return $pluginInfo ? $this->___callPlugins('renderRequestLine', func_get_args(), $pluginInfo) : parent::renderRequestLine();
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toString');
        return $pluginInfo ? $this->___callPlugins('toString', func_get_args(), $pluginInfo) : parent::toString();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllowCustomMethods()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllowCustomMethods');
        return $pluginInfo ? $this->___callPlugins('getAllowCustomMethods', func_get_args(), $pluginInfo) : parent::getAllowCustomMethods();
    }

    /**
     * {@inheritdoc}
     */
    public function setAllowCustomMethods($strictMethods)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAllowCustomMethods');
        return $pluginInfo ? $this->___callPlugins('setAllowCustomMethods', func_get_args(), $pluginInfo) : parent::setAllowCustomMethods($strictMethods);
    }

    /**
     * {@inheritdoc}
     */
    public function setVersion($version)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setVersion');
        return $pluginInfo ? $this->___callPlugins('setVersion', func_get_args(), $pluginInfo) : parent::setVersion($version);
    }

    /**
     * {@inheritdoc}
     */
    public function getVersion()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getVersion');
        return $pluginInfo ? $this->___callPlugins('getVersion', func_get_args(), $pluginInfo) : parent::getVersion();
    }

    /**
     * {@inheritdoc}
     */
    public function setHeaders(\Laminas\Http\Headers $headers)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHeaders');
        return $pluginInfo ? $this->___callPlugins('setHeaders', func_get_args(), $pluginInfo) : parent::setHeaders($headers);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, '__toString');
        return $pluginInfo ? $this->___callPlugins('__toString', func_get_args(), $pluginInfo) : parent::__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function setMetadata($spec, $value = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setMetadata');
        return $pluginInfo ? $this->___callPlugins('setMetadata', func_get_args(), $pluginInfo) : parent::setMetadata($spec, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMetadata($key = null, $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMetadata');
        return $pluginInfo ? $this->___callPlugins('getMetadata', func_get_args(), $pluginInfo) : parent::getMetadata($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setContent');
        return $pluginInfo ? $this->___callPlugins('setContent', func_get_args(), $pluginInfo) : parent::setContent($value);
    }
}
