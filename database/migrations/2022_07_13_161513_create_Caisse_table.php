<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Caisse', function (Blueprint $table) {
            $table->integer('id', true);
            $table->enum('typeOperation', ['Retrait', 'Dépôt', 'Vente', 'achat']);
            $table->string('nomOpérant', 22);
            $table->string('prenomOpérant', 22);
            $table->text('raison');
            $table->integer('montant');
            $table->float('solde', 10, 0);
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
        Schema::dropIfExists('Caisse');
    }
}
