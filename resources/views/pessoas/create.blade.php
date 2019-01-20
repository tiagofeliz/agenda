@extends('template.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Novo Contato</h3>
                    </div>            
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <form action="{{ url('/pessoas/create') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="nome" class="control-label">Nome: </label>
                                <input name="nome" id="nome" class="form-control" value="{{ old('nome') }}"/>
                                @if($errors->has('nome'))
                                    <span class="help-block">
                                        {{ $errors->first('nome') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="ddd" class="control-label">DDD: </label>
                                <input name="ddd" id="ddd" class="form-control" value="{{ old('ddd') }}"/>
                                @if($errors->has('ddd'))
                                    <span class="help-block">
                                        {{ $errors->first('ddd') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="fone" class="control-label">Número: </label>
                                <input name="fone" id="fone" class="form-control" value="{{ old('fone') }}"/>
                                @if($errors->has('fone'))
                                    <span class="help-block">
                                        {{ $errors->first('fone') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <button class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection