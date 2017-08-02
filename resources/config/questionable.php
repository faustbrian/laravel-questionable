<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) Brian Faust <hello@brianfaust.me>
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

        'question' => \BrianFaust\Questionable\Question::class,

        /*
        |--------------------------------------------------------------------------
        | Answer Model
        |--------------------------------------------------------------------------
        */

        'answer' => \BrianFaust\Questionable\Answer::class,

    ],

];
