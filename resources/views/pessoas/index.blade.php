@extends('template.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($pessoas as $pessoa)
                <div class="col-sm-4">
                    <div class="card">
                        <h5 class="card-header">{{$pessoa->nome}}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Números: </h5>
                            @foreach($pessoa->telefone as $telefone)
                                <p class="card-text">
                                    ({{$telefone->ddd}})
                                    {{$telefone->fone}}
                                </p>
                            @endforeach
                            <a href="#" class="btn btn-primary">Add telefone</a>
                            <a href="{{ url("/pessoas/edit/$pessoa->id") }}" class="btn btn-default">Editar contato</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection