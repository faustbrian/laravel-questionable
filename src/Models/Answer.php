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
 * Class Answer.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class Answer extends Model
{
    use PresentableTrait;

    /**
     * @var string
     */
    protected $table = 'questions_answers';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function author()
    {
        return $this->morphTo('author');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * @return bool|int
     */
    public function markAsSolution()
    {
        $this->question->markAsSolved($this->id);

        return $this->update(['is_solution' => true]);
    }

    /**
     * @param Question $question
     * @param $data
     * @param Model $author
     *
     * @return Model|static
     */
    public function createAnswer(Question $question, $data, Model $author)
    {
        $answer = new static();
        $answer->fill(array_merge($data, [
            'author_id' => $author->id,
            'author_type' => get_class($author),
        ]));

        $answer = $question->answers()->save($answer);

        return $answer;
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateAnswer($id, $data)
    {
        $answer = static::find($id);
        $answer->update($data);

        return $answer;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteAnswer($id)
    {
        return static::find($id)->delete();
    }

    /**
     * @return mixed
     */
    public function getPresenterClass()
    {
        return QuestionPresenter::class;
    }
}
