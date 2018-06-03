<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class ContentFlag
 *
 * @method create(array $options = []) \Dan\MemeGenerator\Client
 */
class ContentFlag extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'create' => 'ContentFlag_Create',
    ];

}