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
        Schema::create('livre_products', function (Blueprint $table) {
            $table->id();
            $table->string('image_livre');
            $table->string('titre_livre');
            $table->decimal('prix_livre', 8, 2);
            $table->string('pdf');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livre_products');
    }
};
