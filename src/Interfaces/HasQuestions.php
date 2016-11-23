<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Questionable\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface HasQuestions
{
    public function questions();

    public function createQuestion($data, Model $author);

    public function updateQuestion($id, $data);

    public function deleteQuestion($id);

    public function markAsSolved($answerId);
}
