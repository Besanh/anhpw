<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeo extends Migration
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
        Schema::create('seo_page', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('seo_page');
    }
}
