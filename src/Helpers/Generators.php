<?php

namespace Dan\MemeGenerator\Helpers;

/**
 * Class Generators
 *
 * @method search(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByMgUser(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByNew(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByPopular(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByRecentlyCaptioned(array $options = []) \Dan\MemeGenerator\Client
 * @method selectBySubscriber(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByTrending(array $options = []) \Dan\MemeGenerator\Client
 * @method selectByUpvoted(array $options = []) \Dan\MemeGenerator\Client
 * @method selectRelatedByDisplayName(array $options = []) \Dan\MemeGenerator\Client
 */
class Generators extends AbstractHelper
{

    /** @var array $endpoints */
    public static $endpoints = [
        'search' => 'Generators_Search',
        'selectByMgUser' => 'Generators_Select_ByMgUser',
        'selectByNew' => 'Generators_Select_ByNew',
        'selectByPopular' => 'Generators_Select_ByPopular',
        'selectByRecentlyCaptioned' => 'Generators_Select_ByRecentlyCaptioned',
        'selectBySubscriber' => 'Generators_Select_BySubscriber',
        'selectByTrending' => 'Generators_Select_ByTrending',
        'selectByUpvoted' => 'Generators_Select_ByUpvoted',
        'selectRelatedByDisplayName' => 'Generators_Select_Related_ByDisplayName',
    ];

}