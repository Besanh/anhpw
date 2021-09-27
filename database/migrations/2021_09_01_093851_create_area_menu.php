<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaMenu extends Migration
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
        Schema::create('menu_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('alias', 100);
            $table->text('note')->nullable();
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(0);
            $table->foreignId('type_id')->constrained('menu_types')->onUpdate('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->string('name_seo', 100);
            $table->string('alias', 100);
            $table->string('route', 100)->nullable();
            $table->string('url');
            $table->string('icon', 30)->nullable();
            $table->text('note')->nullable();
            $table->integer('priority')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('menu_types');
        Schema::dropIfExists('menus');
    }
}
