<?php

namespace Dan\MemeGenerator\Helpers;

use Dan\MemeGenerator\Client;

/**
 * Class AbstractHelper
 */
abstract class AbstractHelper
{
    /** @var array $endpoints */
    public static $endpoints = [];

    /** @var Client $client */
    protected $client;

    /**
     * AbstractHelper constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $name
     * @param $arguments
     * @return Client|array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Dan\MemeGenerator\ApiException
     */
    public function __call($name, $arguments)
    {
        if (array_key_exists($name, static::$endpoints)) {
            array_unshift($arguments, $uri = static::$endpoints[$name]);

            return call_user_func_array([$this->client, 'execute'], $arguments);
        }

        return $this->client;
    }

}