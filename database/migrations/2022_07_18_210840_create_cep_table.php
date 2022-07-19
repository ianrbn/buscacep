<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cep', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('code', 8)->unique();
            $table->string('state', 2);
            $table->string('city');
            $table->string('district');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cep');
    }
};
