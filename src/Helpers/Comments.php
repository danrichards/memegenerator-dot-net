<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class Comments
 *
 * @method select(array $options = []) \Dan\MemeGenerator\Client
 */
class Comments extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'select' => 'Comments_Select',
    ];

}