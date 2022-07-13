<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Produit', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom', 22)->nullable();
            $table->integer('quantiteStock')->nullable();
            $table->integer('quantiteAlert')->nullable();
            $table->integer('prix')->nullable();
            $table->integer('categorie')->nullable();
            $table->timestamp('created_date')->nullable()->useCurrent();
            $table->timestamp('updated_date')->nullable()->useCurrent();
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
        Schema::dropIfExists('Produit');
    }
}
