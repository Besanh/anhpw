<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBill extends Migration
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
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('bill_no');
            $table->integer('total_price')->default(0);
            $table->integer('total_discount')->default(0);
            $table->integer('total_cost')->default(0);
            $table->integer('total_tax')->default(0);
            $table->integer('shipping_cost')->default(0);
            $table->string('payment', 100);
            $table->text('note')->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        Schema::create('bill_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bill_id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fullname', 125);
            $table->integer('gender');
            $table->string('phone', 15);
            $table->string('email', 125)->nullable();
            $table->integer('count_sent_mail')->default(0);
            $table->integer('province');
            $table->integer('district');
            $table->string('address', 255);
            $table->string('note', 255)->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        Schema::create('bill_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bill_id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('channel_sale', 50)->nullable();
            $table->text('devices');
            $table->integer('status')->default(0);
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        // Thong tin nguoi nhan hang
        Schema::create('bill_consignees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bill_id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fullname', 125);
            $table->string('email', 50)->nullable();
            $table->string('phone', 15);
            $table->string('address', 255);
            $table->string('note')->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        // Hoa don
        Schema::create('bill_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('bill_id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('company', 255);
            $table->string('taxcode', 15);
            $table->string('email', 100);
            $table->string('phone', 15);
            $table->string('address', 255);
            $table->string('note')->nullable();
            $table->integer('created_by')->default(0)->nullable();
            $table->integer('updated_by')->default(0)->nullable();
            $table->timestamps();
            $table->engine = self::$innodb;
        });

        // Bang phi ship
        Schema::create('shipping_fees', function (Blueprint $table) {
            $table->id();
            $table->string('destination', 100);
            $table->string('delivery_type', 100);
            $table->string('delivery_time', 150);
            $table->string('cost', 50);
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
        Schema::dropIfExists('bill_customers');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('bill_details');
        Schema::dropIfExists('bill_consignees');
        Schema::dropIfExists('bill_invoice');
        Schema::dropIfExists('shipping_fees');
    }
}
