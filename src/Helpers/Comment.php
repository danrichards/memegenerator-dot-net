<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class Comment
 *
 * @method create(array $options = []) \Dan\MemeGenerator\Client
 * @method delete(array $options = []) \Dan\MemeGenerator\Client
 */
class Comment extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'create' => 'Comment_Create',
        'delete' => 'Comment_Delete',
    ];

}