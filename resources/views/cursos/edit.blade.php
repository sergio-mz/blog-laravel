@extends('layouts.plantilla')

@section('title', 'Cursos edit')

@section('content')
    <h1>En esta pagina podras editar un curso</h1>
    <form action="{{route('cursos.update',$curso)}}" method="POST">

        @csrf {{-- agrega un input oculto con un token para temas de seguridad --}}
        @method('put') {{-- como html no entiende el put, aqui lo especifico --}}

        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name',$curso->name)}}">
        </label>

        @error('name') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Descripcion:
            <br>
            <textarea name="descripcion" rows="5">{{old('descripcion',$curso->descripcion)}}</textarea>
        </label>

        @error('descripcion') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror

        <br>
        <label>
            Categoria:
            <br>
            <input type="text" name="categoria" value="{{old('categoria',$curso->categoria)}}">
        </label>

        @error('categoria') {{-- funciona como un if --}}
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <button type="submit">Actualizar formulario</button>
    </form>
@endsection