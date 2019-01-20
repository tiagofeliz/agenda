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
                    <form action="{{ url('/pessoas/new') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group col-sm-12">
                            <label for="nome" class="control-label">Nome: </label>
                            <input name="nome" id="nome" class="form-control"/>
                        </div>
                        <div class="form-group col-sm-12">
                            <button class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection