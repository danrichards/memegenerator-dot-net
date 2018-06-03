<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class MgImage
 *
 * @method select(array $options = []) \Dan\MemeGenerator\Client
 */
class MgImage extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'select' => 'MgImage_Select',
    ];

}