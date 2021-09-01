<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaBill extends Migration
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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->integer('gender');
            $table->string('phone', 15);
            $table->string('email')->nullable();
            $table->string('address');
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total_price')->default(0);
            $table->integer('total_discount')->default(0);
            $table->integer('total_cost')->default(0);
            $table->integer('shipping_cost')->default(0);
            $table->string('payment', 100);
            $table->text('note')->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$myisam;
        });

        Schema::create('bill_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bill_id')->constrained('bills')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('products');
            $table->string('channel_sale', 50);
            $table->text('devices');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('customers');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('bill_details');
    }
}
