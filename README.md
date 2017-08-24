# flysystem-b2

This is a fork based on https://github.com/mhetreramesh/flysystem-backblaze. It includes download file stream. Since B2 SDK from original package no longer maintained (Last PR merge is November 2016), I'm including the B2 SDK that I've forked and modified. This package also include ServiceProvider for Laravel.

Visit (https://secure.backblaze.com/b2_buckets.htm) and get your account id, application key.

The Backblaze adapter gives the possibility to use the Flysystem filesystem abstraction library with backblaze. It uses the [Backblaze B2 SDK](https://github.com/RunCloudIO/b2-sdk-php) to communicate with the API.

## Install

Via Composer

``` bash
$ composer require runcloudio/flysystem-b2
```

## Usage with Laravel


In your app.php config file add to the list of service providers:
```
\RunCloudIO\FlysystemB2\BackblazeServiceProvider::class,
```

Add the following to your filesystems.php config file in the ```disks``` section:
```
'b2' => [
    'driver'         => 'b2',
    'accountId'      => '',
    'applicationKey' => '',
    'bucketName'     => '',
],
```

Just use it as you normally would use the Storage facade.
```
\Storage::disk('b2')->put('test.txt', 'test')
```
and
```
\Storage::disk('b2')->get('test.txt')
```


## Usage without Laravel

``` php
use RunCloudIO\FlysystemB2\BackblazeAdapter;
use League\Flysystem\Filesystem;
use ChrisWhite\B2\Client;

$client = new Client($accountId, $applicationKey);
$adapter = new BackblazeAdapter($client,$bucketName);

$filesystem = new Filesystem($adapter);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email fikri@runcloud.io instead of using the issue tracker.

## Credits

- [RunCloudIO][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mhetreramesh/flysystem-backblaze.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gliterd/flysystem-backblaze/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/gliterd/flysystem-backblaze.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/gliterd/flysystem-backblaze.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mhetreramesh/flysystem-backblaze.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/mhetreramesh/flysystem-backblaze
[link-travis]: https://travis-ci.org/gliterd/flysystem-backblaze
[link-scrutinizer]: https://scrutinizer-ci.com/g/gliterd/flysystem-backblaze/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/gliterd/flysystem-backblaze
[link-downloads]: https://packagist.org/packages/mhetreramesh/flysystem-backblaze
[link-author]: https://github.com/RunCloudIO
[link-contributors]: ../../contributors
