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
        Schema::create('ramens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('shop_name',100);              
            $table->string('prefecture_name',20)->index(); 
            $table->date('ate_on');                    
            $table->text('review');                    
            $table->string('image_path',255)->nullable();
            $table->string('shop_url', 255)->nullable(); 
            $table->boolean('is_recommended')
                  ->default(false)
                  ->index();                           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramens');
    }
};
