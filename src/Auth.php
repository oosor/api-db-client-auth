<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 20.07.19
 * Time: 13:56
 */

namespace Oosor\AuthApiDatabase;


use Oosor\AuthApiDatabase\Contracts\{
    ClientToken, Configuration, PasswordToken, PersonalToken
};
use Oosor\AuthApiDatabase\Models\Build;

class Auth
{
    use AuthHelper;

    /** Helper for get tokens
     * @param string $server
     * @param Configuration $config
     * @return void
     * */
    public function __construct(string $server, Configuration $config = null)
    {
        $this->server = $server;
        $this->config = $config;
    }

    /**
     * @param Configuration $config
     * */
    public function setConfig(Configuration $config)
    {
        $this->config = $config;
    }


    /** builder for data
     * @return ClientToken
     * @throws \Exception
     * */
    public function clientToken()
    {
        $this->validForConfig('clientToken');

        $server = $this->server;
        $config = $this->config;

        return new class($server, $config) extends Build implements ClientToken
        {
            protected function path(): string
            {
                return '/oauth/token';
            }

            protected function data(): array
            {
                return [
                    'grant_type' => 'client_credentials',
                    'client_id' => $this->config->getClientId(),
                    'client_secret' => $this->config->getClientSecret(),
                    'scope' => join(' ', $this->scopes),
                ];
            }

        };
    }

    /** builder for data
     * @return PasswordToken
     * @throws \Exception
     * */
    public function passwordToken()
    {
        $this->validForConfig('passwordToken');

        $server = $this->server;
        $config = $this->config;

        return new class($server, $config) extends Build implements PasswordToken
        {
            protected function path(): string
            {
                return '/oauth/token';
            }

            protected function data(): array
            {
                return [
                    'grant_type' => 'password',
                    'client_id' => $this->config->getClientId(),
                    'client_secret' => $this->config->getClientSecret(),
                    'username' => $this->config->userName(),
                    'password' => $this->config->userPassword(),
                    'scope' => join(' ', $this->scopes),
                ];
            }

            public function addConstructScope()
            {
                if (!in_array('construct', $this->scopes)) {
                    $this->scopes[] = 'construct';
                }
                return $this;
            }
        };
    }

    /** builder for data
     * @param string $name
     * @return PersonalToken
     * @throws \Exception
     * */
    public function personalToken($name)
    {
        $this->validForConfig('personalToken');

        $server = $this->server;
        $config = $this->config;

        $personalBuild = new class($server, $config) extends Build implements PersonalToken
        {
            private $nameToken;

            protected function path(): string
            {
                return '/api/auth-personal-tokens';
            }

            protected function data(): array
            {
                return [
                    'name' => $this->nameToken,
                    'scopes' => $this->scopes,
                ];
            }

            protected function getHeaders()
            {
                return [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->config->accessToken(),
                ];
            }

            public function nameToken($name)
            {
                $this->nameToken = $name;
                return $this;
            }
        };
        $personalBuild->nameToken($name);

        return $personalBuild;
    }
}