<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ventes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('client');
            $table->string('typeCommande', 222);
            $table->integer('somme')->nullable()->default(0);
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('updated_date')->useCurrent();
            $table->timestamp('deleted_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ventes');
    }
}
