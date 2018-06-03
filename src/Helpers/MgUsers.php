<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class MgUsers
 *
 * @method selectByPublisher(array $options = []) \Dan\MemeGenerator\Client
 * @method selectBySubscriber(array $options = []) \Dan\MemeGenerator\Client
 */
class MgUsers extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'selectByPublisher' => 'MgUsers_Select_ByPublisher',
        'selectBySubscriber' => 'MgUsers_Select_BySubscriber',
    ];

}