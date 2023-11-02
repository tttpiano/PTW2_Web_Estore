<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->double("price");
            $table->string("openratingSystems");
            $table->unsignedBigInteger('brandId');
            $table->unsignedBigInteger('ramSizeId');
            $table->unsignedBigInteger('operatingSystemId');
            $table->unsignedBigInteger('internalMemoryId');

            $table->foreign('brandId')
                ->references('id')
                ->on('brands')
                ->onDelete('restrict');


            $table->foreign('ramSizeId')
                ->references('id')
                ->on('ramSizes')
                ->onDelete('restrict');

            $table->foreign('operatingSystemId')
                ->references('id')
                ->on('operatingSystems')
                ->onDelete('restrict');

            $table->foreign('internalMemoryId')
                ->references('id')
                ->on('internalMemorys')
                ->onDelete('restrict');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
