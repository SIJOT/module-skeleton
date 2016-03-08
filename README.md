# :module_name

**Note:** Replace `:author_name` `:author_username` `:author_website` `:author_mail` `:package_name` `:package_description`
with their correct values in [README.md](), [Changelog.md](), [CONTRIBUTING.md](), [LICENSE.md]() and [composer.json]() files, 
then delete this line. 

This is where your description would go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSR's you 
support to avoid any confusion with users and contributors.

## Installation 

Require this package with composer: 

```bash
composer require :authorname/:package_name
```

After updating composer, add the ServiceProvider to the providers array in `config/app/php`

### Laravel 5.X

```bash
:author_name\:package_name\ServiceProvider::class
```

If you like to use the facade, add this to your facades in `config/app.php`

```bash
':facade_name' => :author_name\:package_name\Facade::class,
```

## Security vurnabilities

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Copyright and licensing

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Versioning
