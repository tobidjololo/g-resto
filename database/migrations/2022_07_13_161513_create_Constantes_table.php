<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Constantes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom', 222);
            $table->float('valeur', 10, 0);
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
        Schema::dropIfExists('Constantes');
    }
}
