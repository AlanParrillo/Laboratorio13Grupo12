@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-image: url('images/biblioteca.jpg'); background-size: cover; background-position: center; height: 85vh; display: flex; align-items: center; justify-content: center;">
<main>
    <div class="container">
        <form action="{{ route('subirFoto') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <h5 class="text-white">Subir Una Reseña de algun libro</h5>
            <label class="text-white">Reseña</label>
            <input class="form-control" type="text" name="descripcion" placeholder="Escriba su reseña aqui">
            <input class="form-control" type="file" name="foto">
            <button type="submit" class="btn btn-primary">Subir</button>
        </form>
        <div class="row row-cols-3 mt-1">
            @foreach($fotos as $foto)
            <div class="col">
                <div class="card">
                    <img height="200" src="/foto/{{$foto->ruta}}">
                    <div class="card-body">
                        <p class="card-text">{{$foto->descripcion}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                        <form method="POST" action="{{ route('eliminarFoto') }}">
                                    @csrf
                                    <div class="btn-group">
                                        <input type="hidden" name="id_foto" value="{{$foto->id}}">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Eliminar</button>
                                    </div>
                                </form>    
                        <small class="text-muted">{{$foto->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection