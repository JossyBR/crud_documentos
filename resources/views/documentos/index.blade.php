@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Documentos</h1>
    <form action="{{ route('documentos.search') }}" method="GET">
        <input type="text" name="query" placeholder="Buscar documentos">
        <button type="submit">Buscar</button>
    </form>
    <a href="{{ route('documentos.create') }}" class="mt-4 mb-4 btn btn-primary">Crear Documento</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Código</th>
                <th>Contenido</th>
                <th>Tipo</th>
                <th>Proceso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $documento)
            <tr>
                <td>{{ $documento->doc_nombre }}</td>
                <td>{{ $documento->doc_codigo }}</td>
                <td>{{ $documento->doc_contenido }}</td>
                <td>{{ $documento->tipo->tip_nombre }}</td>
                <td>{{ $documento->proceso->pro_nombre }}</td>
                <td>
                    <a href="{{ route('documentos.edit', $documento->doc_id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('documentos.destroy', $documento->doc_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
