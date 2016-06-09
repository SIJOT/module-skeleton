# Timecontrol API

This package provides the timecontrol API.

## Installation 

Require this package with composer: 

```bash
composer require tjoosten/timecontrol-api
```

After updating composer, add the ServiceProvider to the providers array in `config/app/php`

### Laravel 5.X

```php
Idevelopment\Timecontrol\Api\ServiceProvider::class
```

If you like to use the facade, add this to your facades in `config/app.php`

```php
'TimecontrolApi' => Idevelopment\Timecontrol\Api\Facade\TimecontrolApi::class,
```

After that the only thing u need to do is: 


```
php vendor:publish
```

## Security vurnabilities

If you discover any security related issues, please email Topairy@gmail.com instead of using the issue tracker.

## Copyright and licensing

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Versioning

For transparency into our release cycle and in striving to maintain backward compatibility, scouts en gidsen template is maintained under the [Semantic Versioning guidelines](http://semver.org/). Sometimes we screw up, but we'll adhere to those rules whenever possible.

See the [Releases section](https://github.com/:user/:repo/releases) of our GitHub project for changelogs for each release version of this repo.

