<?php



declare(strict_types=1);

namespace BrianFaust\Questionable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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
