<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_buyer')->constrained('users')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->foreignId('id_seller')->constrained('users')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->foreignId('id_item')->constrained('items')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->foreignId('id_user')->constrained('users')->onUpdate('cascade')->onDelete('restrict')->nullable();
            $table->integer('action');
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
        Schema::dropIfExists('logs_lists');
    }
}
