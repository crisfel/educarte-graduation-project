<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon_url');
            $table->longText('description');
            $table->string('theme_type');
            $table->boolean('is_enable');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
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
        Schema::dropIfExists('projects');
    }
}
