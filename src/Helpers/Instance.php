<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class Instance
 *
 * @method create(array $options = []) \Dan\MemeGenerator\Client
 * @method select(array $options = []) \Dan\MemeGenerator\Client
 */
class Instance extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'create' => 'Instance_Create',
        'select' => 'Instance_Select',
    ];

}