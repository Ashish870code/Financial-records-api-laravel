<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users_table_custom', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);

            $table->string('email', 255)->unique();
            $table->string('role', 255);

            $table->boolean('is_active')->default(true);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users_table_custom');
    }
};
