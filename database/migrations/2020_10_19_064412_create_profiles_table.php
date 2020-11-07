<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('address');
            $table->string('gender',150);
            $table->date('dob');
            $table->string('phone',150)->nullable();
            $table->string('professional_title')->nullable();
            $table->text('experience');
            $table->text('bio');
            $table->text('cover_leter');
            $table->string('resume',150);
            $table->string('avater',150);
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
        Schema::dropIfExists('profiles');
    }
}
