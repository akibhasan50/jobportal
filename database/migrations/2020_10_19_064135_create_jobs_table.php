<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('company_id');
            $table->string('title',150);
            $table->string('slug',170);
            $table->string('roles',170);
            $table->text('description');
            $table->string('position',150);
            $table->integer('category_id');
            $table->text('address');
            $table->string('type',150);
            $table->string('status',150);
            $table->date('last_date',150);
            $table->timestamps();

            $table->foreign('company_id')->references('id')
            ->on('users')->softDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
