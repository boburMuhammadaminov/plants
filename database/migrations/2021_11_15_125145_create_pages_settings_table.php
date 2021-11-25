<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('slug');
            $table->longText('content_uz');
            $table->longText('content_en');
            $table->longText('content_ru');
            $table->foreignId('pagesCategory_id')->references('id')->on('pages_categories')->onDelete('cascade');
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
        Schema::dropIfExists('pages_settings');
    }
}
