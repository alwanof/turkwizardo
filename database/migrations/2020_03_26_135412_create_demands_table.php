<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('desc');
            $table->string('country')->index();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->tinyInteger('showPhone')->default(0);
            $table->string('port')->nullable();
            $table->unsignedInteger('category_id')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('demands');
    }
}
