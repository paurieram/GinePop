<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('state')->default(0);
            $table->foreignId('id_category')->constrained('categories')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_seller')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_buyer')->constrained('users')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->date('expiration_date');
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('items');
    }
}
