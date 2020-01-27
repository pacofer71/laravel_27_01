<?php

use Illuminate\Database\Seeder;

use App\Libro;
class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Primero borramos por si ejecutamos el ssed varias veces
        //no rellenar la tabla cada vez
        DB::table('libros')->truncate(); //vacia la tabla
        factory(Libro::class, 20)->create(); //creo 10 registros
    }
}
