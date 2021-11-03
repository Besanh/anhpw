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

        Schema::create('seo_page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 125)->nullable();
            $table->integer('pid')->nullable();
            $table->string('page_name', 125)->nullable();
            $table->text('seo_desc')->nullable();
            $table->string('seo_keyword', 255)->nullable();
            $table->string('seo_robot', 50)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_bestseller');
        Schema::dropIfExists('seo_page');
    }
}
