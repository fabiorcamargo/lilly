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
        Schema::create('portifolio_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portifolio_id')->constrained('portifolios');
            $table->string('name');
            $table->string('description');
            $table->string('folder');
            $table->string('file');
            $table->string('category');
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
        Schema::dropIfExists('portifolio_photos');
    }
};
