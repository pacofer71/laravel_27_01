@extends('plantillas.plantilla')
@section('titulo')
    Buesqueda
@endsection
@section('cabecera')
Buscar Libros
@endsection
@section('contenido')
<div class="row mb-5">
    <div class='col-md-12'>
    <form name="search" method='get' action="{{route('libros.index')}}"  class="form-inline float-right">
            <h3 class='normal mr-3' style='font-weight:bold'>Bucar: </h3>
            <div class="form-group mr-2">
                @if(!$request->get('titulo'))
                    <input type="text" name="titulo" placeholder="Titulo" class="from-control" aria-label='Search' />
                @else
                    <input type="text" name="titulo" value="{{$request->get('titulo')}}" class="from-control" aria-label='Search' />
                @endif
            </div>
            <div class="form-group mr-2">
                @if(!$request->get('sinopsis'))
                <input type="text" name="sinopsis" placeholder="Sinopsis" class="from-control" aria-label='Search' />
            @else
                <input type="text" name="sinopsis" value="{{$request->get('sinopsis')}}" class="from-control" aria-label='Search' />
            @endif
            </div>
            <div class="form-group ml-2">
                <label class="sr-only" for="inline"> </label>  
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">€</div>
                    </div>
                 
                    <select class="from-control peque" name="pvp" id="inline">
                    <option value="1">Menor de 20€</option>
                    <option value="2">De 20€ a 50€</option>
                    <option value="3">Mayor de 50€</option>

                    </select>
                </div>
            <div class="form-group ml-2">
                <input type='submit' value='Buscar' class='btn btn-info'>
            </div>
        </form>
    </div>  
   
</div>
<table class="table table-striped table-dark normal mt-3">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Titulo</th>
        <th scope="col">Sinopsis</th>
        <th scope="col">Precio (€)</th>
        <th scope="col">ISBN</th>
        <th scope="col">Stock</th>
       
    </tr>
    </thead>
   
    <tbody>
        @foreach($libros as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
        <td>{{$item->titulo}}</td>
        <td>{{$item->sinopsis}}</td>
        <td>{{$item->pvp}}</td>
        <td>{{$item->isbn}}</td>
        <td>{{$item->stock}}</td>
        <td>
       
      </tr>
      @endforeach
      
    </tbody>
  </table>
 {{ $libros->appends(Request::except('page'))->links() }}
@endsection