<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name")->nullable();
            $table->string("customer_image")->nullable();
            $table->string("customer_phone")->nullable();
            $table->string("customer_email")->nullable();
            $table->string("customer_address")->nullable();
            $table->string("customer_barangay")->nullable();
            $table->string("customer_city")->nullable();
            $table->string("customer_province")->nullable();
            $table->string("customer_zipcode")->nullable();
            $table->tinyInteger('status')->default('1');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
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
    }
};
