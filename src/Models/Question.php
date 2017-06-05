<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Questionable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Question extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function questionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function author(): MorphTo
    {
        return $this->morphTo('author');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function bestAnswer(): HasOne
    {
        return $this->hasOne(Answer::class, 'best_answer_id');
    }

    public function createQuestion(Model $questionable, $data, Model $author): self
    {
        $question = new static();
        $question->forceFill(array_merge($data, [
            'author_id' => $author->id,
            'author_type' => get_class($author),
        ]));

        $questionable->questions()->save($question);

        return $question;
    }

    public function updateQuestion($id, $data): bool
    {
        return (bool) static::find($id)->update($data);
    }

    public function deleteQuestion($id): bool
    {
        return static::find($id)->delete();
    }

    public function createAnswer($data, Model $author): Answer
    {
        return (new Answer())->createAnswer($this, $data, $author);
    }

    public function updateAnswer($id, $data): bool
    {
        return (new Answer())->updateAnswer($id, $data);
    }

    public function deleteAnswer($id): bool
    {
        return (new Answer())->deleteAnswer($id);
    }

    public function markAsSolved($answerId): bol
    {
        return (bool) $this->update([
            'is_answered' => true,
            'best_answer_id' => $answerId,
        ]);
    }
}
