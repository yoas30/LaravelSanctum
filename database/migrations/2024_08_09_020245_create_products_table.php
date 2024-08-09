<?php

use App\Models\product;
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
            $table->string('name');
            $table->string('price');
            $table->string('description');
            $table->timestamps();
        });
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            product::create([
                'name'=> $faker->word, //satu kata
                'price'=> $faker->randomNumber(3,true), //3 nomor random
                'description'=> $faker->sentence(5, true), //5 kata
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
