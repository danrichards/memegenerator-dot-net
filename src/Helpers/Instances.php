<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class Instances
 *
 * @method create(array $options = []) \Dan\MemeGenerator\Client
 * @method select(array $options = []) \Dan\MemeGenerator\Client
 * @method search(array $options = []) \Dan\MemeGenerator\Client
 * @method selectBySubscriber(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByMgUser(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByNew(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByPopular(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByUpvoted(array $options = []) \Dan\MemeGenerator\Client
 */
class Instances extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'search' => 'Instances_Search',
        'selectBySubscriber' => 'Instances_Select_By_SubscriberMgUserID',
        'selectByMgUser' => 'Instances_Select_ByMgUser',
        'selectByNew' => 'Instances_Select_ByNew',
        'selectByPopular' => 'Instances_Select_ByPopular',
        'selectByUpvoted' => 'Instances_Select_ByUpvoted',
    ];

}