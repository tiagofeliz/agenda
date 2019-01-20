@extends('template.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Editando Contato</h3>
                    </div>            
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <form action="{{ url('/pessoas/update') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="{{$pessoa->id}}"/>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="nome" class="control-label">Nome: </label>
                                <input name="nome" id="nome" class="form-control" value="{{$pessoa->nome}}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <button class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection