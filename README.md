
# World Time API Wrapper
This package is a wrapper for the [World Time API](https://worldtimeapi.org/) that allows you to easily retrieve information about timezones, locations and current time.

## Installation
You can install the package via composer:

```php
composer require edwardalgorist/world-time
```

## Usage
You can use the package by instantiating the `WorldTime` class:

```php
use EdwardAlgorist\WorldTime\WorldTime;

$worldTime = new WorldTime();
```

## Timezones
You can retrieve a list of valid timezones by calling the `timezones` method:

```php
$timezones = $worldTime->timezones();
```

## Locations
You can retrieve a list of valid locations for a specific area by calling the `locations` method and passing the area as an argument:

```php
$locations = $worldTime->locations('Europe');
```

## Time
You can retrieve the current time for a specific timezone by calling the `time` method and passing the area, location, and (optionally) region as arguments:

```php
$time = $worldTime->time('Europe', 'London');
```

## Time for IP
You can retrieve the current time based on your public IP by calling the `timeForIP` method:

```php
$time = $worldTime->timeForIP();
```

You can also pass a specific IP as an argument:

```php
$time = $worldTime->timeForIP('8.8.8.8');
```


## Validation
The package performs input validation for the `locations`, `time`, and `timeForIP` methods. If the provided inputs are invalid, an `InvalidArgumentException` will be thrown.

## Exception handling
The package throws exceptions for the following cases:

- When an invalid area or location is provided to the `locations` and `time` methods
- When an invalid IP is provided to the `timeForIP` method
- When the API returns a non-200 status code
You can catch these exceptions and handle them accordingly in your code.

## Security
If you discover any security related issues, please email edwardnyirendajr@gmail.com instead of using the issue tracker.

## Credits
- Edward Algorist

License
The MIT License (MIT). Please see [License File](https://google.com) for more information.
