# Laravel Questionable

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-questionable
```

And then include the service provider within `app/config/app.php`.

``` php
BrianFaust\Questionable\QuestionableServiceProvider::class
```

To get started, you'll need to publish the vendor assets and migrate:
```
php artisan vendor:publish --provider="BrianFaust\Questionable\QuestionableServiceProvider" && php artisan migrate
```

## Usage

### Setup a Model
``` php
<?php

namespace App;

use BrianFaust\Questionable\HasQuestions;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasQuestions;
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

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
