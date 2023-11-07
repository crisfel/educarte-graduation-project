<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinators', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('school_id')->unique();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  //set null
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coordinators');
    }
}
