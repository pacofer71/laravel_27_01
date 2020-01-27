@extends('plantillas.plantilla')
@section('titulo')
    Editar libro
@endsection
@section('cabecera')
Editar Libro
@endsection
@section('contenido')
<div class='container mt-3 mb-2'>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<form name="crear" action="{{route('libros.update', $libro)}}" method='post'>
   @csrf
    @method('PUT')
    <div class="row">
      <div class="col">
      <input type="text" class="form-control" value="{{$libro->titulo}}" name='titulo' required>
      </div>
      <div class="col">
        <input type="text" class="form-control" value="{{$libro->isbn}}" maxlength="13" name='isbn' required>
      </div>
    </div>
    <div class="row mt-3">
        <div class="col">
          <input type="number" class="form-control" value="{{$libro->pvp}}" name='pvp' step="0.10" min=0 required>
        </div>
        <div class="col">
          <input type="number" class="form-control" value="{{$libro->stock}}" name='stock' min=0 step=1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <label for="ta" class='normal'>Sinopsis</label>
            <textarea class="form-control" id="a" rows="4" name='sinopsis' required>{{$libro->sinopsis}}</textarea>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <input type="submit" class="btn btn-info normal" value="Editar">
            
        <a href="{{route('libros.listado')}}" class="btn btn-success normal ml-3">Volver</a>
        </div>
    </div>

  </form>
@endsection