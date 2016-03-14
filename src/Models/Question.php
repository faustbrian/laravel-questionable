<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Questionable\Models;

use DraperStudio\Eloquent\Presenter\PresentableTrait;
use DraperStudio\Questionable\Presenters\QuestionPresenter;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class Question extends Model
{
    use PresentableTrait;

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function questionable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function author()
    {
        return $this->morphTo('author');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bestAnswer()
    {
        return $this->hasOne(Answer::class, 'best_answer_id');
    }

    /**
     * @param Model $questionable
     * @param $data
     * @param Model $author
     *
     * @return static
     */
    public function createQuestion(Model $questionable, $data, Model $author)
    {
        $question = new static();
        $question->fill(array_merge($data, [
            'author_id' => $author->id,
            'author_type' => get_class($author),
        ]));

        $questionable->questions()->save($question);

        return $question;
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateQuestion($id, $data)
    {
        $question = static::find($id);
        $question->update($data);

        return $question;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteQuestion($id)
    {
        return static::find($id)->delete();
    }

    /**
     * @param $data
     * @param Model $author
     *
     * @return Model|static
     */
    public function createAnswer($data, Model $author)
    {
        return (new Answer())->createAnswer($this, $data, $author);
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateAnswer($id, $data)
    {
        return (new Answer())->updateAnswer($id, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteAnswer($id)
    {
        return (new Answer())->deleteAnswer($id);
    }

    /**
     * @param $answerId
     */
    public function markAsSolved($answerId)
    {
        $this->update([
            'is_answered' => true,
            'best_answer_id' => $answerId,
        ]);
    }

    /**
     * @return mixed
     */
    public function getPresenterClass()
    {
        return QuestionPresenter::class;
    }
}
