<?php

namespace BrianFaust\Questionable\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface HasQuestions
{
    public function questions();

    public function createQuestion($data, Model $author);

    public function updateQuestion($id, $data);

    public function deleteQuestion($id);

    public function markAsSolved($answerId);
}
