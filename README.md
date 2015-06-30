# InstagramAPI

Instagram API package

## Installation

The reccomended way to install this pacakge is through [Composer](https://getcomposer.org). The package is available on [Packagist](https://packagist.org/packages/fantasyrock/instagram)

You may require the package by calling `composer require fantasyrock/instagram`

or add the package manually into your `composer.json` file:

```json
{
    "require": {
        "fantasyrock/instagram": "*"
    }
}
```

Package currently works with **Guzzle HTTP Client Library** and needs to be added into your composer file:

```json
{
    "require": {
        "guzzle/guzzle": "^6.0@dev"",
    }
}
```

## Adapters

Currently the packages offers only Guzzle as HTTP adapter but you may easily build your own by extending `HttpAbstract` and implementing `HttpAdapterInterface`

### Example
```php
<?php 

require 'vendor/autoload.php';

use Instagram\Adapters\GuzzleAdapter;
use Instagram\Instagram;

$adapter = new GuzzleAdapter('access_token');
$factory = new Instagram($adapter);
```

## Sessions

As adapters the package currently only offers support for Native Sessions. However like adapters you may easily build your own by extending `SessionAbstract` and implementing `SessionAdapterInterface`


### Example
```php
<?php 

require 'vendor/autoload.php';

use Instagram\Adapters\Storage\NativeSessionAdapter;
use Instagram\Security\Credentials;

$storage     = new NativeSessionAdapter();
$credentials = new Credentials(['client_id', 'client_secret', 'redirect_uri'], $storage);
```

## Endpoints

* User
* Media
* Tag
* Comment
* Like
* Relationship
* Geography
* Location


## Credentials

API needs a valid access token provided by instagram. If your application already has access to user tokens you may pass
it directly to the HttpClientAdapter in our case GuzzleAdapter.

To obtain the access key you may generate the login URL `Credentials` part of the package and requesting the access token with appropriate adapter

### Example

```php
<?php

require 'vendor/autoload.php';

use Instagram\Adapters\Http\GuzzleAdapter;
use Instagram\Adapters\Storage\NativeSessionAdapter;
use Instagram\Security\Credentials;
use Instagram\Instagram;

$storage     = new NativeSessionAdapter();
$credentials = new Credentials([
    'client_id'     => 'YOUR-CLIENT-ID',
    'client_secret' => 'YOUR-CLIENT-SECRET',
    'redirect_uri'  => 'REDIRECT-URI
  ], $storage);

// You may provide additional scope as array of desired additional permissions
$loginUrl = $credentials->getLoginUrl(['basic', 'likes']);
```

## Usage
```php
<?php 

require 'vendor/autoload.php';

use Instagram\Adapters\Http\GuzzleAdapter;
use Instagram\Adapters\Storage\NativeSessionAdapter;
use Instagram\Security\Credentials;
use Instagram\Instagram;

$storage     = new NativeSessionAdapter();
$credentials = new Credentials([
    'client_id'     => 'YOUR-CLIENT-ID', 
    'client_secret' => 'YOUR-CLIENT-SECRET', 
    'redirect_uri'  => 'REDIRECT-URI
  ], $storage);
  
$adapter = new GuzzleAdapter($credentials->getToken());  
$factory = new Instagram($adapter);
  
  
$user = $factory->UserClient();
var_dump($user->getInfo());
```

## Issues

Any problems that may arise or for bug spottings please open up an [Issue case] (https://github.com/rockoo/InstagramAPI/issues)
