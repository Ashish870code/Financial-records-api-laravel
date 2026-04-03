<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema :: table('tasks', function (Blueprint $table) {
            $table-> float('amount', 10, 2)->after('id');
            $table->enum('type', ['income', 'expense'])->after('amount');
            $table->string('category')->after('type');
            $table->date('date')->after('category');
        });

    }
};
