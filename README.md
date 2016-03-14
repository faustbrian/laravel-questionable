# Laravel Questionable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-questionable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    DraperStudio\Questionable\ServiceProvider::class
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="DraperStudio\Questionable\ServiceProvider" && php artisan migrate
```

## Usage

### Setup a Model
``` php
<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use DraperStudio\Questionable\Contracts\Questionable;
use DraperStudio\Questionable\Traits\Questionable as QuestionableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Questionable
{
    use QuestionableTrait;
}
```

### Ask a question
``` php
$post->createQuestion([
    'title' => 'Some title',
    'body' => 'Some body',
], $user);
```

### Update a question
``` php
$post->updateQuestion(1, [
    'title' => 'new title',
    'body' => 'new body',
]);
```

### Delete a question
``` php
$post->deleteQuestion(1);
```

### Answer to a question
``` php
$question->createAnswer([
    'title' => 'Some title',
    'body' => 'Some body',
], $user);
```

### Update an answer
``` php
$question->updateAnswer(1, [
    'title' => 'new title',
    'body' => 'new body',
]);
```

### Delete an answer
``` php
$question->deleteAnswer(1);
```

### Mark an answer as solution
``` php
$answer->markAsSolution();
```
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-questionable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Questionable/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-questionable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-questionable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-questionable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-questionable
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Questionable
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-questionable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-questionable
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-questionable
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
