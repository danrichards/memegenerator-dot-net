<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class MgImages
 *
 * @method select(array $options = []) \Dan\MemeGenerator\Client
 */
class MgImages extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'search' => 'MgImage_Search',
    ];

}