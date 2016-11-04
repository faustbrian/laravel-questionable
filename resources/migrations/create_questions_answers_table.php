<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('questions_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->morphs('author');
            $table->string('title');
            $table->text('body');
            $table->boolean('is_solution')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions_answers');
    }
}
