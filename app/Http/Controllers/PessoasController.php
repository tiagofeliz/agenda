<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Telefone;
use Validator;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    //Controllers
    private $telefones_controller;
    //Models
    private $pessoa;

    public function __construct(TelefonesController $telefones_controller){
        $this->telefones_controller = $telefones_controller;
        $this->pessoa = new Pessoa();
    }

    public function index($letra = null){
        $list_pessoas = Pessoa::getByFirstLetter($letra);
        return view('pessoas.index', [
            'pessoas' => $list_pessoas,
            'criterio' => $letra
        ]);
    }

    public function filter (Request $request){
        $list_pessoas = Pessoa::getByName($request->nome);
        return view('pessoas.index', [
            'pessoas' => $list_pessoas,
            'criterio' => $request->nome
        ]);
    }

    public function new(){
        return view('pessoas.create');
    }

    public function edit($id){
        return view('pessoas.update', [
            'pessoa' => $this->pessoa->find($id)
        ]);
    }

    public function remove($id){
        return view('pessoas.delete', [
            'pessoa' => $this->pessoa->find($id)
        ]);
    }

    //CRUD
        
    public function create(Request $request){

        $validacao = $this->validacao($request->all());

        if($validacao->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validacao->errors())
                    ->withInput($request->all());
        }

        $pessoa = Pessoa::create($request->all());
        if($request->ddd && $request->fone){
            $telefone = new Telefone();
            $telefone->ddd = $request->ddd;
            $telefone->fone = $request->fone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->new($telefone);
        }
        return redirect('/pessoas')->with("message", "Contato cadastrado com sucesso.");
    }

    public function update(Request $request){
        $pessoa = $this->pessoa->find($request->id);
        $pessoa->update($request->all());
        return redirect('/pessoas')->with("success", "Atualizado com sucesso!");
    }

    public function delete(Request $request){
        $pessoa = $this->pessoa->find($request->id);
        $pessoa->delete($request->all());
        return redirect('/pessoas')->with("success", "Excluído com sucesso!");
    }

    private function validacao($data){
        $regras = [
            'nome' => 'required|min:3'
        ];

        $mensagens = [
            'nome.required' => 'O nome do contato é obrigatório',
            'nome.min' => 'O nome do contato deve ter no mínimo 3 caracteres',
        ];

        if(array_key_exists('ddd', $data) || array_key_exists('fone', $data)){
            $regras['ddd'] = 'required|size:2';
            $regras['fone'] = 'required|size:9';
            $mensagens['ddd.required'] = 'O DDD do número é obrigatório';
            $mensagens['fone.required'] = 'O número do contato é obrigatório';
        }

        return Validator::make($data, $regras, $mensagens);
    }
}
