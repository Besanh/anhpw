<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cate_id');
            $table->integer('bid');
            $table->string('name');
            $table->string('name_seo');
            $table->string('designer')->nullable();
            $table->timestamp('public_year')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->json('galeries')->nullable();
            $table->integer('promote')->default(0);
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sap_id')->nullable();
            $table->integer('pid')->nullable();
            $table->string('barcode');
            $table->string('name');
            $table->integer('sex')->default(0);
            $table->integer('promote')->default(0);
            $table->string('capa')->comment('Size');
            $table->integer('capa_id');
            $table->bigInteger('price');
            $table->text('note')->nullable();
            $table->integer('status')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('capacities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_seo');
            $table->text('description')->nullable();
            $table->string('image')->default('no-image.png')->nullable();
            $table->integer('priority')->default(0);
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('review_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid');
            $table->string('name');
            $table->string('email');
            $table->text('content')->nullable();
            $table->text('reply');
            $table->integer('rate')->default(0);
            $table->integer('heart')->default(0);
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('prices');
        Schema::dropIfExists('capacities');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('review_products');
    }
}
