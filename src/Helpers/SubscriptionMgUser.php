<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class SubscriptionMgUser
 *
 * @method create(array $options = []) \Dan\MemeGenerator\Client
 * @method delete(array $options = []) \Dan\MemeGenerator\Client
 */
class SubscriptionMgUser extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'create' => 'Subscription_MgUser_Create',
        'delete' => 'Subscription_MgUser_Delete',
    ];

}