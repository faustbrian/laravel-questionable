<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Questionable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Eloquent Models
    |--------------------------------------------------------------------------
    */

    'models' => [

        /*
        |--------------------------------------------------------------------------
        | Question Model
        |--------------------------------------------------------------------------
        */

        'question' => \Artisanry\Questionable\Question::class,

        /*
        |--------------------------------------------------------------------------
        | Answer Model
        |--------------------------------------------------------------------------
        */

        'answer' => \Artisanry\Questionable\Answer::class,

    ],

];
