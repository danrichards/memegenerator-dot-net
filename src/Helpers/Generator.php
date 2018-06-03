<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class Comments
 *
 * @method create(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByUrlNameOrGeneratorID(array $options = []) \Dan\MemeGenerator\Client
 */
class Generator extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'create' => 'Comments_Select',
        'selectByUrlNameOrGeneratorID' => 'Generator_Select_ByUrlNameOrGeneratorID',
    ];

}