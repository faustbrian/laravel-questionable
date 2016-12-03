<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Laravel Questionable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Questionable;

use BrianFaust\Eloquent\Presenter\PresentableTrait;
use BrianFaust\Questionable\Presenters\QuestionPresenter;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use PresentableTrait;

    protected $table = 'questions_answers';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function author()
    {
        return $this->morphTo('author');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function markAsSolution()
    {
        $this->question->markAsSolved($this->id);

        return $this->update(['is_solution' => true]);
    }

    public function createAnswer(Question $question, $data, Model $author)
    {
        $answer = new static();
        $answer->fill(array_merge($data, [
            'author_id'   => $author->id,
            'author_type' => get_class($author),
        ]));

        $answer = $question->answers()->save($answer);

        return $answer;
    }

    public function updateAnswer($id, $data)
    {
        $answer = static::find($id);
        $answer->update($data);

        return $answer;
    }

    public function deleteAnswer($id)
    {
        return static::find($id)->delete();
    }

    public function getPresenterClass()
    {
        return QuestionPresenter::class;
    }
}
