# Description

A Laraval Package to send sms messages. It supports multiple sms gateways, and easily extendable to support new gateways.
The default cofing supports mobily.ws and smsgw.net , and you can easily add any other gateway ( see [Defining new gateways](#gateways) )

## Table of Contents

- [Features and Requirements](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Defining new gateways](#gateways)
- [License](#License)
- [Essentials](#essentials)

## Features & Requirements

* Supports sending messages directly
* Supports sending messages at a certain date/time
* Supports sending messages to multiple numbers at once
* Supports multiple number formats see [Usage](#usage)
* Support using multiple gateways and sender names at the same time.
* Requires an active account with any sms gateway.
* Supports Laravel 5.*
* cURL 
* php >=5.5.0

## Installation

Install with composer by running  `composer require abdullahobaid/sms:dev-master`  
Composer will download and install the package. if you are using Laravel > 5.5 go directly to [Config](#config)
**if you are using laravel < 5.4 ONLY**
open `config/app.php` and add the service provider and alias as below:

    'providers' => array(
        ...
        abdullahobaid\sms\SmsProvider::class,
    ),
    .
    .
    .
    'aliases' => array(
        ...
        'SMS'    => abdullahobaid\sms\SMS::class,
    ),

### config
Publish the configuration file by running the following Artisan command.

```php
$ php artisan vendor:publish --provider="abdullahobaid\sms\SmsProvider"
```
Finally, you need to edit the configuration file at  `config/sms.php` with your own gateway info. Also you need to set your default Gateway at the top of the config file.

## Usage

## Methods
### Check Balance
```php 
SMS::Balance($gatewayName = false);
```
Returns the current balance for the default gateway or for the giving one.
### Send Message / Messages
```php 
SMS::Send($numbers,$message,$dateTime=false,$senderName=false,$gatwayName=false);
```
#### $numbers ( Required )

You can pass a single number or array of numbers, see examples below:

* The number can be sent with trailing zeros 00966555555555 
* With trailing plus sign +966555555555 
* International number without trailing zeros 966555555555 
* Even you can use the mobile number without international code - for Saudi Mobile Numbers Only - 0555555555 , the package will take care of formatting the number.

#### $message ( Required )
The message text

#### $dateTime ( Optional )
dateTime format `Y-m-d H:i:s`

#### $senderName ( Optional )
Override default sender name

#### $gatewayName ( Optional )
Override default gateway

## Examples
### Send SMS message directly
Will send the message directly to the number
```php 
SMS::Send(966555555555, 'Your Message Here');
```
Returns `true` if the message is sent, `false` if not.
### Send SMS to Multiple Numbers
Pass an array of numbers instead of a single number to send to all of them
```php 
$numbers = array('966555555555','966545555555','966565555555');
SMS::Send($numbers, 'Your Message Here');
```
Returns `true` if the message is sent, `false` if not.
### Send SMS message at a certain date/time
Will send the message in a desired date and time
```php 
SMS::send(966555555555, 'Your Message Here', $dateTime);
```
##### note
* DateTime format `Y-m-d H:i:s`
* Returns `true` if the message is sent, `false` if not.


### Check the current Balance
```php 
SMS::Balance();
```
Returns user's balance.

### Get number of SMS messages a text requires

```php 
SMS::count_messages($text);
```

### Override default sender name

```php 
SMS::Send(966555555555, 'Your Message Here', $dateTime=false,'SenderName');
```
Note that the new sender should be registered and activate at mobily.ws website


## License

Waqf General Public Licens

## Essentials
* [Laravel](https://laravel.com)
* Follow me on Twitter [@mobde3](https://twitter.com/mobde3/)
