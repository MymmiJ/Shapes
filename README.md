# Shapes

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require MymmiJ/Shapes
```

## Usage

``` php
$skeleton = new MymmiJ\Shapes();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email jimmy.macgregor@futurenet.com instead of using the issue tracker.

## Credits

- [Jimmy MacGregor][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/MymmiJ/Shapes.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/MymmiJ/Shapes/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/MymmiJ/Shapes.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/MymmiJ/Shapes.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/MymmiJ/Shapes.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/MymmiJ/Shapes
[link-travis]: https://travis-ci.org/MymmiJ/Shapes
[link-scrutinizer]: https://scrutinizer-ci.com/g/MymmiJ/Shapes/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/MymmiJ/Shapes
[link-downloads]: https://packagist.org/packages/MymmiJ/Shapes
[link-author]: https://github.com/MymmiJ
[link-contributors]: ../../contributors
