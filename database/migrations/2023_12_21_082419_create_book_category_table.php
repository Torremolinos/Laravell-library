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
        Schema::create('book_category', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //primero declaramos las claves ID y luego abajo las declaramos foraneas
            $table->unsignedBigInteger('book_id'); // foreign key column (for id we use unsignedBigInteger)
            $table->unsignedBigInteger('category_id'); // foreign key column (for id we use unsignedBigInteger)

            // foreign key constraints
            $table->foreign('book_id')->references('id')->on('books'); // foreign key column (for id we use unsignedBigInteger)
            $table->foreign('category_id')->references('id')->on('categories'); // foreign key column (for id we use unsignedBigInteger) 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_category');
    }
};
