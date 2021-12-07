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
            $table->string('link')->nullable();
            $table->string('tel', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('website', 125)->nullable();
            $table->string('working_time')->nullable();
            $table->string('image')->nullable();
            $table->string('note')->nullable();
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
            $table->integer('rep_id')->default(0);
            $table->string('name', 125);
            $table->string('email', 125);
            $table->string('phone', 15);
            $table->string('address');
            $table->string('subject');
            $table->text('content');
            $table->text('reply')->nullable();
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('value_setting');
            $table->enum("type", ["json", "text", "image"]);
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
