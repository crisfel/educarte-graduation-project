<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadedHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaded_homeworks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('path')->nullable();
            $table->string('status')->default('notUploaded');
            $table->integer('score');
            $table->unsignedBigInteger('homework_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('homework_id')->references('id')->on('homework')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploaded_homeworks');
    }
}
