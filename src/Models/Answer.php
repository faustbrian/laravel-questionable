<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Questionable.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Questionable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Answer extends Model
{
    protected $table = 'questions_answers';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function author(): MorphTo
    {
        return $this->morphTo('author');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function markAsSolution(): bool
    {
        $this->question->markAsSolved($this->id);

        return $this->update(['is_solution' => true]);
    }

    public function createAnswer(Question $question, $data, Model $author): self
    {
        $answer = new static();
        $answer->forceFill(array_merge($data, [
            'author_id'   => $author->id,
            'author_type' => get_class($author),
        ]));

        $answer = $question->answers()->save($answer);

        return $answer;
    }

    public function updateAnswer($id, $data): bool
    {
        return (bool) static::find($id)->update($data);
    }

    public function deleteAnswer($id): bool
    {
        return (bool) static::find($id)->delete();
    }
}
