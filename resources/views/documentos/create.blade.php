@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Documento</h1>
    <form action="{{ route('documentos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doc_nombre">Nombre</label>
            <input type="text" class="form-control" id="doc_nombre" name="doc_nombre" required>
        </div>
        <div class="form-group">
            <label for="doc_contenido">Contenido</label>
            <textarea class="form-control" id="doc_contenido" name="doc_contenido" required></textarea>
        </div>
        <div class="form-group">
            <label for="doc_id_tipo">Tipo</label>
            <select class="form-control" id="doc_id_tipo" name="doc_id_tipo" required>
                @foreach($tipos as $tipo)
                <option value="{{ $tipo->tip_id }}">{{ $tipo->tip_nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doc_id_proceso">Proceso</label>
            <select class="form-control" id="doc_id_proceso" name="doc_id_proceso" required>
                @foreach($procesos as $proceso)
                <option value="{{ $proceso->pro_id }}">{{ $proceso->pro_nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
