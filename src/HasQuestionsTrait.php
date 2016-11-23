<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Questionable;

use Illuminate\Database\Eloquent\Model;

trait HasQuestionsTrait
{
    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function createQuestion($data, Model $author)
    {
        return (new Question())->createQuestion($this, $data, $author);
    }

    public function updateQuestion($id, $data)
    {
        return (new Question())->updateQuestion($id, $data);
    }

    public function deleteQuestion($id)
    {
        return (new Question())->deleteQuestion($id);
    }
}
