<?php

/*
 * This file is part of Laravel Questionable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Questionable\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface Questionable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
interface Questionable
{
    /**
     * @return mixed
     */
    public function questions();

    /**
     * @param $data
     * @param Model $author
     *
     * @return mixed
     */
    public function createQuestion($data, Model $author);

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateQuestion($id, $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteQuestion($id);

    /**
     * @param $answerId
     *
     * @return mixed
     */
    public function markAsSolved($answerId);
}
