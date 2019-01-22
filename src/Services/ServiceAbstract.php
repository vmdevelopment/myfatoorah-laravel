<?php

namespace VMdevelopment\MyFatoorah\Services;

/**
 * Class ServiceAbstract
 * @package VMdevelopment\MyFatoorah\Services
 */
class ServiceAbstract implements ServiceInterface
{
    /**
     * @var \VMdevelopment\MyFatoorah\Request\RequestInterface
     */
    protected $requestable;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @param $token
     */
    public function setAccessToken($token)
    {
        $this->requestable->setAccessToken($token);
    }

    /**
     * @return \VMdevelopment\MyFatoorah\Request\AccessToken
     */
    public function getAccessToken()
    {
        return $this->requestable->getAccessToken();
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->requestable->setHeaders($headers);
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function setParameter($name,$value)
    {
        return $this->parameters[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getParameter($name)
    {
        return $this->parameters[$name];
    }

    /**
     * @return array
     */
    public function mapParamsToArray()
    {
        return $this->parameters;
    }
}