<?php

namespace Dan\MemeGenerator;

use Dan\MemeGenerator\Helpers\AbstractHelper;
use Dan\MemeGenerator\Helpers\Comment;
use Dan\MemeGenerator\Helpers\Comments;
use Dan\MemeGenerator\Helpers\ContentFlag;
use Dan\MemeGenerator\Helpers\Generator;
use Dan\MemeGenerator\Helpers\Generators;
use Dan\MemeGenerator\Helpers\Instance;
use Dan\MemeGenerator\Helpers\Instances;
use Dan\MemeGenerator\Helpers\MgImage;
use Dan\MemeGenerator\Helpers\MgImages;
use Dan\MemeGenerator\Helpers\MgUser;
use Dan\MemeGenerator\Helpers\MgUsers;
use Dan\MemeGenerator\Helpers\SubscriptionGenerator;
use Dan\MemeGenerator\Helpers\SubscriptionMgUser;
use Dan\MemeGenerator\Helpers\Templates;
use Dan\MemeGenerator\Helpers\Vote;
use Exception;
use GuzzleHttp\Client as BaseClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

/**
 * Class Client
 *
 * @property Comment $comment
 * @property Comments $comments
 * @property ContentFlag $content_flag
 * @property Generator $generator
 * @property Generators $generators
 * @property Instance $instance
 * @property Instances $instances
 * @property MgImage $image
 * @property MgImages $images
 * @property MgUser $user
 * @property MgUsers $users
 * @property SubscriptionGenerator $subscription_generator
 * @property SubscriptionMgUser $subscription_user
 * @property Templates $templates
 * @property Vote $vote
 */
class Client
{
    /** @var BaseClient $client */
    protected $client;

    /** @var AbstractHelper $api*/
    protected $api;

    /** @var null|string $last_success */
    protected $last_success = null;

    /** @var null|int $last_elapse_ms */
    protected $last_elapse_ms = null;

    /** @var null|string $last_warning */
    protected $last_warning = null;

    /** @var array $apis */
    protected static $apis = [
        'comment' => Comment::class,
        'comments' => Comments::class,
        'content_flag' => ContentFlag::class,
        'generator' => Generator::class,
        'generators' => Generators::class,
        'instance' => Instance::class,
        'instances' => Instances::class,
        'image' => MgImage::class,
        'images' => MgImages::class,
        'user' => MgUser::class,
        'users' => MgUsers::class,
        'subscription_generator' => SubscriptionGenerator::class,
        'subscription_user' => SubscriptionMgUser::class,
        'templates' => Templates::class,
        'vote' => Vote::class,
    ];

    /**
     * Client constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $api_key
     */
    public function __construct($username, $password, $api_key)
    {
        $this->client = new BaseClient([
            'auth' => [$username, $password],
            'base_uri' => 'http://version1.api.memegenerator.net/',
            'handler' => static::makeQueryHandler($api_key),
        ]);
    }

    /**
     * @param $api_key
     * @return HandlerStack
     */
    private static function makeQueryHandler($api_key)
    {
        $middleware = function (RequestInterface $request) use($api_key) {
            return $request->withUri(Uri::withQueryValue($request->getUri(), 'apiKey', $api_key));
        };

        // Add the apiKey to every query made
        $handler = HandlerStack::create();
        $handler->unshift(Middleware::mapRequest($middleware));

        return $handler;
    }

    /**
     * @param string $uri
     * @param array $query
     * @return array
     * @throws Exception|ApiException|GuzzleException
     */
    public function execute($uri, array $query = [])
    {
        /** @var Response $res */
        $response = $this->client->request('GET', $uri, compact('query'));

        $data = json_decode($response->getBody(), $assoc = true);

        $this->last_success = $data['success'] ?? null;
        $this->last_elapse_ms = $data['elapseMS'] ?? null;
        $this->last_warning = $data['warning'] ?? null;

        if (! $this->last_success) {
            throw new ApiException($data['error']);
        }

        return $data['result'] ?? [];
    }

    /**
     * @param $name
     * @return $this
     */
    public function __get($name)
    {
        // If an api keyword is used, change the current api.
        if (array_key_exists($name, static::$apis)) {
            /** @var AbstractHelper $api */
            $api = static::$apis[$name];

            $this->api = new $api($this);
        }

        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        // If an api is set and a endpoint keyword is used, resolve.
        if (is_object($this->api)) {
            $api = $this->api;

            if (array_key_exists($name, $api::$endpoints)) {
                return call_user_func_array([$api, $name], $arguments);
            }
        }

        // Otherwise, do it raw doge on the Guzzle client.
        return call_user_func([$this->client, $name], $arguments);
    }

    /**
     * @return null|string
     */
    public function getLastSuccess()
    {
        return $this->last_success;
    }

    /**
     * @return null|int
     */
    public function getLastElapseMs()
    {
        return $this->last_elapse_ms;
    }

    /**
     * @return null|string
     */
    public function getLastWarning()
    {
        return $this->last_warning;
    }
}