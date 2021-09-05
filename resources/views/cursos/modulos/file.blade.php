@extends('cursos.modulos.show')

@section('lessons')
<div class="card">
    <div class="card-body">
        <p class="card-description">
            <h4>Clique no botao abaixo para baixar o material de apoio!</h4>
            <button class="btn btn-success">Baixar Ficheiro</button>
        </p>
        <iframe class="form-control" src="{{ url('adminn/assets/img/files/'.$ficha->path) }}" frameborder="2" style="height: 300px; width:800px"></iframe>
    </div>
</div>
@endsection