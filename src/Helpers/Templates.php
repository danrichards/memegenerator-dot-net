<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class Templates
 *
 * @method selectByUrlName(array $options = []) \Dan\MemeGenerator\Client
 * @method delete(array $options = []) \Dan\MemeGenerator\Client
 */
class Templates extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'selectByUrlName' => 'Templates_Select_ByUrlName',
    ];

}