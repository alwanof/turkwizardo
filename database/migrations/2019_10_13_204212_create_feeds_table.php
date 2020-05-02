<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hash')->index();
            $table->string('slug')->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->string('city')->index();
            $table->string('website');
            $table->text('tags');
            $table->unsignedInteger('rate')->default(0);
            $table->tinyInteger('recommended')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->string('lang', 2)->index();
            $table->unsignedInteger('category_id');
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
        Schema::dropIfExists('feeds');
    }
}
