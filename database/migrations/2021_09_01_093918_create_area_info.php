<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaInfo extends Migration
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
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('note')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('note')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('location')->nullable();
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('image')->default('no-image.png')->nullable();
            $table->timestamp('published_at');
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('subject');
            $table->string('phone', 15);
            $table->text('message')->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('settings', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('value_setting');
            $table->enum("type", ["json", "text"]);
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
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('stores');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('settings');
    }
}
