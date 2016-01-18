# Laravel Questionable

## Installation

First, pull in the package through Composer.

```js
composer require draperstudio/laravel-questionable:1.0.*@dev
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    DraperStudio\Questionable\ServiceProvider::class
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="DraperStudio\Questionable\ServiceProvider" && php artisan migrate
```

-----

### Setup a Model
```php
<?php

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
```php
$post->createQuestion([
    'title' => 'Some title',
    'body' => 'Some body',
], $user);
```

### Update a question
```php
$post->updateQuestion(1, [
    'title' => 'new title',
    'body' => 'new body',
]);
```

### Delete a question
```php
$post->deleteQuestion(1);
```

### Answer to a question
```php
$question->createAnswer([
    'title' => 'Some title',
    'body' => 'Some body',
], $user);
```

### Update an answer
```php
$question->updateAnswer(1, [
    'title' => 'new title',
    'body' => 'new body',
]);
```

### Delete an answer
```php
$question->deleteAnswer(1);
```

### Mark an answer as solution
```php
$answer->markAsSolution();
```
