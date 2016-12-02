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

use BrianFaust\Eloquent\Presenter\PresentableTrait;
use BrianFaust\Questionable\Presenters\QuestionPresenter;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use PresentableTrait;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function questionable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->morphTo('author');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function bestAnswer()
    {
        return $this->hasOne(Answer::class, 'best_answer_id');
    }

    public function createQuestion(Model $questionable, $data, Model $author)
    {
        $question = new static();
        $question->fill(array_merge($data, [
            'author_id'   => $author->id,
            'author_type' => get_class($author),
        ]));

        $questionable->questions()->save($question);

        return $question;
    }

    public function updateQuestion($id, $data)
    {
        $question = static::find($id);
        $question->update($data);

        return $question;
    }

    public function deleteQuestion($id)
    {
        return static::find($id)->delete();
    }

    public function createAnswer($data, Model $author)
    {
        return (new Answer())->createAnswer($this, $data, $author);
    }

    public function updateAnswer($id, $data)
    {
        return (new Answer())->updateAnswer($id, $data);
    }

    public function deleteAnswer($id)
    {
        return (new Answer())->deleteAnswer($id);
    }

    public function markAsSolved($answerId)
    {
        $this->update([
            'is_answered'    => true,
            'best_answer_id' => $answerId,
        ]);
    }

    public function getPresenterClass()
    {
        return QuestionPresenter::class;
    }
}
