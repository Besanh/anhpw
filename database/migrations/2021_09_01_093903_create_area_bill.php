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
            $table->string('fullname', 125);
            $table->integer('gender', 1);
            $table->string('phone', 15);
            $table->string('email', 125)->nullable();
            $table->integer('province', 10);
            $table->integer('district', 10);
            $table->string('address', 255);
            $table->string('note', 255);
            $table->string('zip_code', 15)->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rowId', 500);
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
            $table->engine = self::$innodb;
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
            $table->engine = self::$innodb;
        });

        // Thong tin nguoi nhan hang
        Schema::create('bill_consignees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bill_id')->constrained('bills')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fullname', 125);
            $table->string('email', 125);
            $table->string('phone', 15);
            $table->string('address', 255);
            $table->string('note')->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        // Hoa don
        Schema::create('bill_invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bill_id')->constrained('bills')->onDelete('cascade')->onUpdate('cascade');
            $table->string('company', 255);
            $table->string('tax_code', 100);
            $table->string('email', 125);
            $table->string('phone', 15);
            $table->string('address', 255);
            $table->string('note')->nullable();
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
        Schema::dropIfExists('customers');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('bill_details');
        Schema::dropIfExists('bill_consignees');
        Schema::dropIfExists('bill_invoice');
    }
}
