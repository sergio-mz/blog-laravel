@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')
    <h1>Bienvenidos a la pagina cursos</h1>
    <a href="{{route('cursos.create')}}">Crear curso</a>
    <ul>
        @foreach ($cursos as $curso)
            <li>
                <a href="{{route('cursos.show',$curso)}}">{{ $curso->name }}</a> {{-- la ruta toma automaticamente la primera variable (id) de el objeto $curso --}}
            </li>
        @endforeach
    </ul>

    {{ $cursos->links() }}
@endsection
