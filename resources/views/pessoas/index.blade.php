@extends('template.app')

@section('content')
    <div class="container">
        <div class="container">
            @foreach (range('A', 'Z') as $letra)
                <div class="btn-group">
                    <a href="{{ url("/pessoas/$letra") }}" class="btn btn-primary {{ $letra == $criterio ? 'disabled' : '' }}">{{ $letra }}</a>
                </div>
            @endforeach
        </div>

        @if($criterio)
            <h4>Critério de pesquisa: {{ $criterio }}</h4>
        @endif

        <div class="row">
            @foreach($pessoas as $pessoa)
                <div class="col-sm-6">
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
                            <a href="{{ url("/pessoas/remove/$pessoa->id") }}" class="btn btn-default">Deletar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection