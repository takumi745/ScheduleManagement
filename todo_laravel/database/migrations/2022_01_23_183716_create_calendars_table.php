<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //  テーブルを作成・更新するメソッドを記述するメソッド
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('color')->nullable();
            $table->boolean('visibility')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //  変更を元に戻すメソッドを記述するメソッド
    public function down()
    {
        Schema::dropIfExists('calendars');
    }
}
