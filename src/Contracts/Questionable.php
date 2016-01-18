<?php

namespace DraperStudio\Questionable\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Questionable
{
    public function questions();

    public function createQuestion($data, Model $author);

    public function updateQuestion($id, $data);

    public function deleteQuestion($id);

    public function markAsSolved($answerId);
}
