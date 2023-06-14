@extends('layouts.app')
@section('content')
<div class="container">


@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif

<a href="{{ url('estudiante/create') }}" class="btn btn-succees" >Registrar</a>
<br>
<br>
<table class="table table-dark">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Fecha de Nacimiento</th>
            <th>Materias Cursadas</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($estudiantes as $estudiante)
        <tr>
            <td>{{ $estudiante->id }}</td>
            <td>
                <img src="{{ asset('storage').'/'.$estudiante->foto }}" width= "100" alt="">
                {{ $estudiante->Foto }}</td>
            <td>{{ $estudiante->Nombre }}</td>
            <td>{{ $estudiante->Apellido }}</td>
            <td>{{ $estudiante->Cedula }}</td>
            <td>{{ $estudiante->Telefono }}</td>
            <td>{{ $estudiante->Correo }}</td>
            <td>{{ $estudiante->Direccion }}</td>
            <td>{{ $estudiante->Estado }}</td>
            <td>{{ $estudiante->Municipio }}</td>
            <td>{{ $estudiante->FechaDeNacimiento }}</td>
            <td>{{ $estudiante->MateriasCursadas }}</td>
            <td> <a href="{{ url('/estudiante/'.$estudiante->id.'/edit') }}" class="btn btn-warning">
                Editar
            </a> | 
                
                <form action="{{ url('/estudiante/'.$estudiante->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}

                    <input class="btn btn-danger" type="submit" onclick="return confirm('Desea Borrar este estudiante?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection