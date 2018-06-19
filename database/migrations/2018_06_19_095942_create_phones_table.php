<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            // Марка телефона
            $table->string('brand');
            // Дата покупки телефона
            $table->string('data-buy');
            // Название телефона
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('phones', function (Blueprint $table) {
            $table->integer('user_id',false,true)
                ->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
        Schema::table('phones', function (Blueprint $table) {
            $table->dropForeign('phones_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
