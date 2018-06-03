# MemeGenerator API

An MemeGenerator.net API Client for PHP. 

## Supported Endpoints:

* [Comment](http://version1.api.memegenerator.net/#Comment_Create)
* [Comments](http://version1.api.memegenerator.net/#Comments_Select)
* [ContentFlag](http://version1.api.memegenerator.net/#ContentFlag_Create)
* [Generator](http://version1.api.memegenerator.net/#Generator_Create)
* [Generators](http://version1.api.memegenerator.net/#Generators_Search)
* [Instance](http://version1.api.memegenerator.net/#Instance_Select)
* [Instances](http://version1.api.memegenerator.net/#Instances_Search)
* [MgImage](http://version1.api.memegenerator.net/#MgImage_Select)
* [MgImages](http://version1.api.memegenerator.net/#MgImages_Search)
* [MgUser](http://version1.api.memegenerator.net/#MgUser_Login)
* [MgUsers](http://version1.api.memegenerator.net/#MgUsers_Select_ByPublisher)
* [SubscriptionGenerator](http://version1.api.memegenerator.net/#Subscription_Generator_Create)
* [SubscriptionMgUser](http://version1.api.memegenerator.net/#Subscription_MgUser_Create)
* [Templates](http://version1.api.memegenerator.net/#Templates_Select_ByUrlName)
* [Vote](http://version1.api.memegenerator.net/#Vote)

## Composer

    $ composer require dan/memegenerator-dot-net-api v1.0.*
    
## Usage without Laravel

```
// Assumes setup of client with access token.
$api = new \Dan\MemeGenerator\Client(
    $username = '<memegenerator.username>',
    $password = '<memegenerator.password>',
    $api_key = '<memegenerator.api_key>'
);

// Returns array
$api->instances->selectByPopular();
```

## Usage with Laravel

### Publish the config file.

The package will auto-discover with Laravel 5.5 or higher, otherwise

### Add the following to your `providers` array in your `config/app.php`:

    Dan\MemeGenerator\Support\Laravel\MemeGeneratorServiceProvider::class,
    
```
