<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 20.07.19
 * Time: 15:29
 */

namespace Oosor\AuthApiDatabase\Models;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Oosor\AuthApiDatabase\Contracts\BaseBuild;
use Oosor\AuthApiDatabase\Contracts\Configuration;

abstract class Build implements BaseBuild
{
    private $server;
    protected $client;
    protected $config;
    protected $scopes = [];

    /** builder for data token
     * @param string $server
     * @param Configuration $configuration
     * @return void
     * */
    public function __construct($server, Configuration $configuration)
    {
        $this->client = new Client();
        $this->server = $server;
        $this->config = $configuration;
    }

    /** scope
     * @return $this
     * */
    public function addSelectScope()
    {
        if (!in_array('show', $this->scopes)) {
            $this->scopes[] = 'show';
        }
        return $this;
    }

    /** scope
     * @return $this
     * */
    public function addInsertScope()
    {
        if (!in_array('store', $this->scopes)) {
            $this->scopes[] = 'store';
        }
        return $this;
    }

    /** scope
     * @return $this
     * */
    public function addUpdateScope()
    {
        if (!in_array('update', $this->scopes)) {
            $this->scopes[] = 'update';
        }
        return $this;
    }

    /** scope
     * @return $this
     * */
    public function addDeleteScope()
    {
        if (!in_array('delete', $this->scopes)) {
            $this->scopes[] = 'delete';
        }
        return $this;
    }


    /** get token data
     * @return Bearer
     * @throws ClientException
     * */
    public function get()
    {
        $result = $this->client->post($this->link(), [
            'headers' => $this->getHeaders(),
            'json' => $this->data(),
        ]);

        if ($result) {
            return new Bearer($result->getBody()->getContents());
        }

        return null;
    }

    /** get headers
     * @return array
     * */
    protected function getHeaders()
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    /** get link request
     * @return string
     * */
    protected function link()
    {
        return preg_replace('/\/$/', '', $this->server) . $this->path();
    }

    /** path request
     * @return string
     * */
    abstract protected function path(): string;

    /** data request
     * @return array
     * */
    abstract protected function data(): array;
}