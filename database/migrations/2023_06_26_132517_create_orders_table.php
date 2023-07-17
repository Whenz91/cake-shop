<?php

use App\Models\Cake;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cake::class);
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('city', 255);
            $table->integer('zipcode');
            $table->string('address', 255);
            $table->dateTime('shipping_at', $precision = 0);
            $table->string('comment', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
