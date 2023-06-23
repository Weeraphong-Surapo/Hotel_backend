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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('address')->comment('ที่อยู่');
            $table->string('phone')->comment('เบอร์โทร');
            $table->string('line_id')->comment('ไลน์ไอดี');
            $table->string('email')->comment('อีเมลล์');
            $table->integer('monthly')->comment('รายเดือน');
            $table->integer('electricity_bill')->comment('ค่าไฟ');
            $table->integer('water_bill')->comment('ค่าน้ำ');
            $table->integer('common_value')->comment('ค่าส่วนกลาง');
            $table->integer('facilities')->comment('สิ่งอำนวยความสะดวก');
            $table->string('name')->comment('ชื่อหอพัก');
            $table->unsignedBigInteger('category_id')->comment('ประเภท');
            $table->integer('rent')->comment('ค่าเช่า');
            $table->integer('internet')->comment('ค่าอินเตอร์เน็ต');
            $table->integer('car_park')->comment('ค่าที่จอดรถ');
            $table->string('nearby_places')->comment('สถานที่ไกล้เคียง');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};