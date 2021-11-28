<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name_uz');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('position_uz');
            $table->string('position_en');
            $table->string('position_ru');
            $table->string('phone');
            $table->string('email');
            $table->string('reception_uz');
            $table->string('reception_en');
            $table->string('reception_ru');
            $table->string('image');
            $table->longText('biography_uz');
            $table->longText('biography_en');
            $table->longText('biography_ru');
            $table->longText('charges_uz');
            $table->longText('charges_en');
            $table->longText('charges_ru');
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('staff');
    }
}
