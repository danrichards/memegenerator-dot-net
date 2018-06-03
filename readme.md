# MemeGenerator API

An MemeGenerator.net API Client for PHP. 

## Supported APIs:

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

    $ composer require dan/memegenerator v1.0.*
    
## Usage without Laravel

```
// Assumes setup of client with access token.
$client = new \Dan\MemeGenerator\Client(
    $username = '<memegenerator.username>',
    $password = '<memegenerator.password>',
    $api_key = '<memegenerator.api_key>'
);

// Returns array
$client->instances->selectByPopular();
```

### You may also pass arguments as follows:

```
// For example, we can return the 2nd page of results
$client->instances->selectByPopular(['pageIndex' => 1]);
```

## Usage with Laravel

The package will auto-discover with Laravel 5.5 or higher, otherwise

### Add the following to your `providers` array in your `config/app.php`:

    Dan\MemeGenerator\Support\Laravel\MemeGeneratorServiceProvider::class,
    

### Publish the config file.

    $ php artisan vendor:publish --provider="Dan\MemeGenerator\Support\Laravel\MemeGeneratorServiceProvider"

### Get the client

```
$client = app(Dan\MemeGenerator\Client::class);

// Do stuff
$client->pick_an_api->doStuffWithAnEndpoint();
```

## General Usage

### 1. Get the client

```
$client = app(Dan\MemeGenerator\Client::class);
```

### 2. Select the API with property reference

```
// Returns Dan\MemeGenerator\Client prepared for the `instances` API
$client = $api->instances
```

### 3. Make your request

```
// Returns array
$arr = $client->instances->selectByPopular();
```

## Architecture Concept

- The `Dan\MemeGenerator\Client` class decorates `GuzzleHttp\Client`
- On the decorator, `__get` provides syntactical sugar for selecting an API.
- On the decorator, `__call` provides syntactical sugar for executing requests

Everything to boils down to `execute` being called on `Dan\MemeGenerator\Client`

> If necessary, you can use the Guzzle client directly.

```
$base_client = $client->getClient();
```