<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelp extends Migration
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
        Schema::create('helps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('help_type_id');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->integer('priority')->default(0);
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        Schema::create('help_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('alias');
            $table->integer('priority')->nullable(0);
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('help_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('help_id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->text('content');
            $table->integer('priority')->default(0);
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('helps');
        Schema::dropIfExists('help_types');
        Schema::dropIfExists('help_contents');
    }
}
