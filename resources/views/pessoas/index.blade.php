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

        <div class="row" style="margin: 12px;">
            <div class="col-sm-6">
                @if($criterio)
                <h4>Critério de pesquisa: {{ $criterio }}</h4>
                @endif
            </div>
            <div class="col-sm-6">
                <form action="{{ url('/pessoas/filter') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input name="nome" id="nome" class="form-control" placeholder="Nome do contato"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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