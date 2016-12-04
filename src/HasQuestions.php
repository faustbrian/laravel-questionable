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

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasQuestions
{
    public function questions(): MorphMany
    {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function createQuestion($data, Model $author): Question
    {
        return (new Question())->createQuestion($this, $data, $author);
    }

    public function updateQuestion($id, $data): Question
    {
        return (new Question())->updateQuestion($id, $data);
    }

    public function deleteQuestion($id): Question
    {
        return (new Question())->deleteQuestion($id);
    }
}
