<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlider extends Migration
{
    public static $myisam = 'MyISAM';
    public static $innodb = 'InnoDB';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revolution_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ["SLIDE_NO_TYPE", "SLIDE_WRITTER", "SLIDE_BTN_WRITTER"]);
            $table->string('image')->nullable();
            $table->string('title', 125)->nullable();
            $table->string('type_writter')->nullable();
            $table->string('btn_name')->nullable();
            $table->string('link')->nullable();
            $table->integer('priority')->default(0);
            $table->string('status')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        Schema::dropIfExists('revolution_sliders');
    }
}
