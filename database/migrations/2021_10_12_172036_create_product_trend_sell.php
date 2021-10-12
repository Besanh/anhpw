<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTrendSell extends Migration
{
    public static $myisam = "MyISAM";
    public static $innodb = "InnoDB";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_bestseller', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid');
            $table->timestamp('date_saved');
            $table->integer('counts')->default(0);
            $table->integer('status', 1)->default(0);
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        // Schema::create('product_trending', function(Blueprint $table){

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_bestseller');
    }
}
