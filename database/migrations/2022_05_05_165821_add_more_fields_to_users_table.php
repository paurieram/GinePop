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
                'surname' => 'admin',
                'state' => '3'
            )   
        );
        DB::table('categories')->insert([
            ['name' => 'bicis', 'image' => '/categoria.png'],
            ['name' => 'motxiles', 'image' => '/categoria.png'],
            ['name' => 'roba', 'image' => '/categoria.png'],
            ['name' => 'sabates', 'image' => '/categoria.png']
        ]);
        DB::table('items')->insert([
            ['name' => 'BICICLETA BTWIN ROCKRIDER DE MONTAÑA', 'price' => '180','description' => 'ESTA COMO NUEVA NO LE FALTA NADA RUEDA DE ATRAS COMO NUEVA Y PUÑOS TAMBIEN +PITON DE REGALO','location' => 'Melilla','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Bicicleta de montaña', 'price' => '1.500','description' => 'Bicicleta de montaña de carbono doble suspensión marca Canyon de Lux.','location' => 'Las Vegas','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Bicicleta de montaña', 'price' => '80','description' => 'Bicicleta de montaña, está bien en buenas condición se puede usar.','location' => 'Alicante','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => '', 'price' => '','description' => '','location' => '','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],

        ]);
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
