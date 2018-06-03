<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class SubscriptionGenerator
 *
 * @method create(array $options = []) \Dan\MemeGenerator\Client
 * @method delete(array $options = []) \Dan\MemeGenerator\Client
 */
class SubscriptionGenerator extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'create' => 'Subscription_Generator_Create',
        'delete' => 'Subscription_Generator_Delete',
    ];

}