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
                'state' => '3',
                'email_verified_at' => '2022-01-01'
            )   
        );
        DB::table('categories')->insert([
            ['name' => 'Bicis', 'image' => '/img/categories/bicis.png', 'state' => '0', 'created_at' => '2022-01-01'],
            ['name' => 'Motxilles', 'image' => '/img/categories/motxilles.png', 'state' => '0', 'created_at' => '2022-01-01'],
            ['name' => 'Roba', 'image' => '/img/categories/roba.png', 'state' => '0', 'created_at' => '2022-01-01'],
            ['name' => 'Sabates', 'image' => '/img/categories/sabates.png', 'state' => '0', 'created_at' => '2022-01-01']
        ]);
        DB::table('items')->insert([
            ['name' => 'BICICLETA BTWIN ROCKRIDER DE MONTAÑA', 'price' => 180,'description' => 'ESTA COMO NUEVA NO LE FALTA NADA RUEDA DE ATRAS COMO NUEVA Y PUÑOS TAMBIEN +PITON DE REGALO','location' => 'Melilla','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Bicicleta de montaña', 'price' => 1.500,'description' => 'Bicicleta de montaña de carbono doble suspensión marca Canyon de Lux.','location' => 'Las Vegas','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Bicicleta de montaña', 'price' => 80,'description' => 'Bicicleta de montaña, está bien en buenas condición se puede usar.','location' => 'Alicante','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Bicicleta de montaña', 'price' => 180,'description' => 'Bicicleta de montaña rockrider seminueva de 26 pulgadas de acero talla pequeña.','location' => 'Gijón','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Bicicleta de montaña', 'price' => 70,'description' => 'Tiene algunos óxidos de estar en la calle. La vendo por ni usar cables nuevos incluye luces delanteras y traseras cascos bonba y cajetin de herramientas.','location' => 'Esquinzo','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Bicicleta de montaña', 'price' => 95,'description' => 'Bicicleta de montaña, rueda de 26, cuentakilómetros, suspensión delantera. Regalo casco y bomba. Sólo recogida.','location' => 'Carbajal de La Legua','id_category' => '1','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Mochila impermeable táctica', 'price' => 26.5,'description' => 'Mochila impermeable capacidad de 15L, ideal para acampada, caza, pesca, senderismo o el uso que quieras darle, es amplia y esta completamente nueva, la tengo en ambos colores Hago envíos a toda España y los gastos corren de mi cuenta (concretamos por WhatsApp)Mochila impermeable capacidad de 15L, ideal para acampada, caza, pesca, senderismo o el uso que quieras darle, es amplia y esta completamente nueva, la tengo en ambos colores Hago envíos a toda España y los gastos corren de mi cuenta (concretamos por WhatsApp)','location' => 'Madrid','id_category' => '2','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Mochila bullpadel', 'price' => 25,'description' => 'A estrenar','location' => 'Madrid','id_category' => '2','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'NUEVO Mochila Bullpadel', 'price' => 25,'description' => 'A estrenar','location' => 'Madrid','id_category' => '2','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Mochila montaña', 'price' => 5,'description' => 'Mochila APRENAZ 30 litros.','location' => 'Madrid','id_category' => '2','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Mochila montaña', 'price' => 10,'description' => 'Mochila Quechua FORCLAZ 30 litros con cubierta para la lluvia','location' => 'Madrid','id_category' => '2','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Roba d`esport Maristes (varis)', 'price' => 8,'description' => 'Ropa de deporte uniforme Maristas. Tengo disponibles los siguientes artículos: - pantalón largo chándal T-8: 8 euros. - sudadera chándal T-4: 8 euros. - camiseta manga corta T-8: 5 euros. - pantalón corto T-6: 4 euros. - camiseta manga larga T-8 y T-10: 6 euros','location' => 'Rubí','id_category' => '3','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Roba nàstic talla 140', 'price' => 25,'description' => 'Roba nàstic , samarreta d entrenament, polo de passeig i jaqueta xandall, talla 140 benj 1 i 2 any aprox.','location' => 'L`Ametlla de Merola','id_category' => '3','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Chaqueta polar térmica MAMMUT', 'price' => 65,'description' => 'Chaqueta polar térmica MAMMUT ideal para deportes de montaña. Talla S Buen estado. Medidas Pecho 100 cm - largo 64 cm Se entrega en Barcelona (zona Sagrada Familia) Envío solo por Correos certificado, precio no incluido (8€) Pago BIZUM o transferencia Bancaria la caixa. No se envio por WALLAPOP No WALLAPAY No contrarembolso No Paypal No intercambios Gbp forro Salomón the north face escalada travesía roba01','location' => 'Barcelona','id_category' => '3', 'id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Roba Esportiva', 'price' => 15,'description' => 'Pantaló malla elàstica Marca: Nike Talla L','location' => 'L`Hospitalet de Llobregat','id_category' => '3','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Chaqueta deporte 12/A', 'price' => 8,'description' => 'Chaqueta deporte 12/A, con capucha almacenada y totalmente forrada. Bolsillos laterales con cremalleras. Talla 6/7 que equivale a 10-12 años. Tejido de calidad. Hago envíos. Hago packs por si te interesan varias cosas del perfil. Chico niño noi xiquet ropa roba moda sport esport deporte','location' => 'Rubí','id_category' => '3', 'id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Roba esportiva', 'price' => 18,'description' => 'Jersei Adidas maniga curta i 2 pantalons . per noi noia de 11 a 14 anys, tot 18€','location' => 'Tordera','id_category' => '3','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Zapatillas Adidas', 'price' => 25,'description' => 'Zapatillas Adidas. Numero 35. Usadas en contadas ocasiones. En perfecto estado. #Adidas, cazado, calçat, zapatos, sabates, zapatillas, deportivas, deporte, bambas, ropa, roba, moda, niña, infantil#','location' => 'Vinyols i els Arcs', 'id_category' => '4', 'id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Zapatillas de golf Skechers', 'price' => 45,'description' => 'Zapatillas de golf Skechers, color negro, talla 44 eur, estado muy bueno, ideal primavera verano','location' => 'Madrid', 'id_category' => '4','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Zapatilla adizero Ubersonic 4 Tenis', 'price' => 80,'description' => 'Zapatillas de tenis. Solo usado una vez y por lo tanto no hay arañazos ni marcas. Estoy los vendiendo porque son demasiado pequeños para mi. Enviarme un mensaje si tiene alguna pregunta. Normalmente el precio es 140€! La talla es 46 2/3 or US 12 or UK 11.5','location' => 'Madrid', 'id_category' => '4','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Zapatillas Adidas mujer talla 38 nuevas', 'price' => 35,'description' => 'Nuevas entrega en madrid estación de metro','location' => 'Madrid', 'id_category' => '4','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Zapatillas talla 40', 'price' => 25,'description' => 'Zapatillas talla 40','location' => 'Madrid', 'id_category' => '4','id_seller'=>'1','expiration_date'=>'2024-05-26'],
            ['name' => 'Zapatillas Puma RSX-E 38 (37)', 'price' => 55,'description' => 'Están completamente nuevas y son muy bonitas. Dice que son 38 y me quedaron pequeñas así que creo que más bien son 37. Te las envío con la caja original. No las puedo cambiar, las vendo y envío en su caja original como me llegaron a mi.','location' => 'Madrid', 'id_category' => '4','id_seller'=>'1','expiration_date'=>'2024-05-26']
        ]);
        DB::table('imgs')->insert([
            ['id_item' => '1', 'url' => '/img/productes/11.webp'],
            ['id_item' => '1', 'url' => '/img/productes/12.webp'],
            ['id_item' => '2', 'url' => '/img/productes/21.webp'],
            ['id_item' => '2', 'url' => '/img/productes/22.webp'],
            ['id_item' => '3', 'url' => '/img/productes/31.webp'],
            ['id_item' => '3', 'url' => '/img/productes/32.webp'],
            ['id_item' => '4', 'url' => '/img/productes/41.webp'],
            ['id_item' => '4', 'url' => '/img/productes/42.webp'],
            ['id_item' => '5', 'url' => '/img/productes/51.webp'],
            ['id_item' => '5', 'url' => '/img/productes/52.webp'],
            ['id_item' => '6', 'url' => '/img/productes/61.webp'],
            ['id_item' => '6', 'url' => '/img/productes/62.webp'],
            ['id_item' => '7', 'url' => '/img/productes/71.webp'],
            ['id_item' => '7', 'url' => '/img/productes/72.webp'],
            ['id_item' => '8', 'url' => '/img/productes/81.webp'],
            ['id_item' => '8', 'url' => '/img/productes/82.webp'],
            ['id_item' => '9', 'url' => '/img/productes/91.webp'],
            ['id_item' => '9', 'url' => '/img/productes/92.webp'],
            ['id_item' => '10', 'url' => '/img/productes/101.webp'],
            ['id_item' => '10', 'url' => '/img/productes/102.webp'],
            ['id_item' => '11', 'url' => '/img/productes/111.webp'],
            ['id_item' => '11', 'url' => '/img/productes/112.webp'],
            ['id_item' => '12', 'url' => '/img/productes/121.webp'],
            ['id_item' => '12', 'url' => '/img/productes/122.webp'],
            ['id_item' => '13', 'url' => '/img/productes/131.webp'],
            ['id_item' => '13', 'url' => '/img/productes/132.webp'],
            ['id_item' => '14', 'url' => '/img/productes/141.webp'],
            ['id_item' => '14', 'url' => '/img/productes/142.webp'],
            ['id_item' => '15', 'url' => '/img/productes/151.webp'],
            ['id_item' => '15', 'url' => '/img/productes/152.webp'],
            ['id_item' => '16', 'url' => '/img/productes/161.webp'],
            ['id_item' => '16', 'url' => '/img/productes/162.webp'],
            ['id_item' => '17', 'url' => '/img/productes/171.webp'],
            ['id_item' => '17', 'url' => '/img/productes/172.webp'],
            ['id_item' => '18', 'url' => '/img/productes/181.webp'],
            ['id_item' => '18', 'url' => '/img/productes/182.webp'],
            ['id_item' => '19', 'url' => '/img/productes/191.webp'],
            ['id_item' => '19', 'url' => '/img/productes/192.webp'],
            ['id_item' => '20', 'url' => '/img/productes/201.webp'],
            ['id_item' => '20', 'url' => '/img/productes/202.webp'],
            ['id_item' => '21', 'url' => '/img/productes/211.webp'],
            ['id_item' => '21', 'url' => '/img/productes/212.webp'],
            ['id_item' => '22', 'url' => '/img/productes/221.webp'],
            ['id_item' => '22', 'url' => '/img/productes/222.webp'],
            ['id_item' => '23', 'url' => '/img/productes/231.webp'],
            ['id_item' => '23', 'url' => '/img/productes/232.webp']
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
