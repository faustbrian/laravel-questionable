<?php

namespace DraperStudio\Questionable\Traits;

use DraperStudio\Questionable\Models\Question;
use Illuminate\Database\Eloquent\Model;

trait Questionable
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
