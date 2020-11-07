<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cname',160);
            $table->string('slug',160);
            $table->text('address');
            $table->integer('phone');
            $table->string('website',160);
            $table->text('description');
            $table->string('logo',160);
            $table->string('cover_photo',160);
            $table->string('slogun',160);
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
        Schema::dropIfExists('companies');
    }
}
