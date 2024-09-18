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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name');
            $table->string('second_name');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('image_path');
            $table->string('description')->default('Нет описания...');
            $table->timestamps();
        });

        
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_path');
            $table->foreignID('ingredients') ->references('id')->on('ingredients') ->onDelete('cascade');
            $table->string('description')->default('Нет описания...');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('product_id');
            $table->integer('castomer_id');
            $table->foreignID('courier_id')->references('id')->on('users') ->onDelete('cascade'); ;
            $table->integer('price');
            $table->string('status');
            $table->string('address');
            $table->string('comment');

            $table->timestamps();
        });

Schema::create('order_positions', function (Blueprint $table) {
            $table->id();    
            $table->foreignID('order_id')->references('id')->on('orders') ->onDelete('cascade'); ;
            $table->foreignID ('dish_id') ->references('id')->on('dishes') ->onDelete('cascade'); ;
            $table->foreignID ('selected_ingredient_id') ->references('id')->on('ingredients') ->onDelete('cascade'); ;
            $table->integer('price');
            $table->integer('quantity');
            
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
