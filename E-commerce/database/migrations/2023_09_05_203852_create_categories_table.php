<?php

use App\Models\Categorie;
use App\Models\Product;
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

        Schema::create('categories', function (Blueprint $table){

            $table->id();
            $table->string('name');
            $table->timestamps();

        });

        Schema::create('categorie_product', function (Blueprint $table){
            $table->id();
            $table->foreignIdFor(Categorie::class);
            $table->foreignIdFor(Product::class);
            $table->timestamps();
        });
    }


    
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categorie_product');
    }
};
