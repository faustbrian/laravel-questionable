<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Questionable\Traits;

use DraperStudio\Questionable\Models\Question;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Questionable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
trait Questionable
{
    /**
     * @return mixed
     */
    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }

    /**
     * @param $data
     * @param Model $author
     *
     * @return static
     */
    public function createQuestion($data, Model $author)
    {
        return (new Question())->createQuestion($this, $data, $author);
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateQuestion($id, $data)
    {
        return (new Question())->updateQuestion($id, $data);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteQuestion($id)
    {
        return (new Question())->deleteQuestion($id);
    }
}
