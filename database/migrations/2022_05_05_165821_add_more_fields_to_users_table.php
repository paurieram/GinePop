<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('instagram')->nullable();
            $table->integer('whatsapp')->nullable();
            $table->string('o_contact')->nullable();
            $table->integer('state')->default(0);
        });
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'informaticaescola@ginebro.cat',
                'password' => '$2y$10$BFpXSg4b4UFYfMeCZ1L4jugMpgeKTqYd8OAiGX7JiNkwX4Wb08kZ2',
                'surname' => 'admin'
            )   
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
