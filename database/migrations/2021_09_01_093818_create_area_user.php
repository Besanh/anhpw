<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaUser extends Migration
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
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onUpdate('cascade');
            $table->string('fullname');
            $table->string('phone', 15);
            $table->string('address');
            $table->string('image')->nullable();
            $table->timestamp('birthday');
            $table->integer('gender');
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 125)->unique();
            $table->string('ip');
            $table->text('device');
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('social_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provider_id');
            $table->string('email');
            $table->string('provider', 100);
            $table->enum('type', ['FRONTEND', 'BACKEND']);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
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
        Schema::dropIfExists('profile');
        Schema::dropIfExists('subscribers');
        Schema::dropIfExists('social_providers');
    }
}
