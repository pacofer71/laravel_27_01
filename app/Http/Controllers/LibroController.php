<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;
use Session;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo=$request->get('titulo');
        $sinopsis=$request->get('sinopsis');
        $pvp=$request->get('pvp');

        $libros=Libro::orderBy('id')
        ->titulo($titulo)
        ->sinopsis($sinopsis)
        ->pvp($pvp)
        ->paginate(5);

        return view('libros.search', compact('libros', 'request'));
    }
    //Metodo creado por mi
    public function mostrarTodos(){
        //$libros=Libro::all();
        $libros=Libro::paginate(5);
        return view('libros.listado', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required',
            'sinopsis'=>'required',
            'pvp'=>'required',
            //'isbn'=>'required|unique:libros,isbn|isbn'
            //'isbn'=>['required', 'unique:libros', 'isbn']
        ]);

        //Os dejo abierto como controlar si no paso el validate
        Libro::create($request->all());
        Session::flash('mensaje', 'Libro Creado Correctamente.');
        return redirect()->route('libros.listado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     
     */
    public function show(Libro $libro)
    {
        
        //dd($libro->id);
        return $libro;
    }
    public function edit(Libro $libro){
        return view('libros.edit', compact('libro'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo'=>'required',
            'sinopsis'=>'required',
            'pvp'=>'required|min:0',
            //'isbn'=>'required|unique:libros,isbn,|isbn'
            //'isbn'=>['required', 'unique:libros,isbn,'.$libro->id, 'isbn']
        ]);
        $libro->update($request->all());
        Session::flash('mensaje', 'Libro Actualizado Correctamente.');
        return redirect()->route('libros.listado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        //Pasamos un mensaje diciendo que hmos borrado el libro
        Session::flash('mensaje', 'Libro Borrado Correctamente.');
        return redirect()->route('libros.listado');
    }
}
