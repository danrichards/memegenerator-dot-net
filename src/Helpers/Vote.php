<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class Vote
 *
 * @method vote(array $options = []) \Dan\MemeGenerator\Client
 */
class Vote extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'vote' => 'Vote',
    ];

    /**
     * @param string $entity_name
     * @param int $entity_id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function up($entity_name, $entity_id)
    {
        $this->__call(static::$endpoints['vote'], [
            'entityId' => $entity_id,
            'entityName' => $entity_name,
            'voteScore' => 1,
        ]);
    }

    /**
     * @param string $entity_name
     * @param int $entity_id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function down($entity_name, $entity_id) {
        $this->__call(static::$endpoints['vote'], [
            'entityId' => $entity_id,
            'entityName' => $entity_name,
            'voteScore' => -1,
        ]);
    }

}