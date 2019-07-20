<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 20.07.19
 * Time: 14:48
 */

namespace Oosor\AuthApiDatabase;


trait AuthHelper
{
    private $server;
    /**
     * @var \Oosor\AuthApiDatabase\Contracts\Configuration $config
     * */
    private $config;


    /** validation for $method
     * @param string $method
     * @return bool
     * @throws \Exception
     * */
    protected function validForConfig(string $method)
    {
        if (isset($this->config)) {
            switch ($method) {

                case 'clientToken':
                    if (is_null($this->config->getClientId()) || is_null($this->config->getClientSecret())) {
                        throw new \Exception('Method clientToken is required values in Configuration::getClientId() and Configuration::getClientSecret()');
                    }
                    break;

                case 'passwordToken':
                    if (is_null($this->config->getClientId()) ||
                        is_null($this->config->getClientSecret()) ||
                        is_null($this->config->userName()) ||
                        is_null($this->config->userPassword())
                    ) {
                        throw new \Exception('Method passwordToken is required values in Configuration::getClientId() and Configuration::getClientSecret() and Configuration::userName() and Configuration::userPassword()');
                    }
                    break;

                case 'personalToken':
                    if (is_null($this->config->accessToken())) {
                        throw new \Exception('Method personalToken is required values in Configuration::accessToken(), and token should\'t be clientToken');
                    }
                    break;
            }
            return true;
        }

        throw new \Exception('Configuration is null');
    }
}