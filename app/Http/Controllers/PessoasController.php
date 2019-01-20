<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Telefone;
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

    public function index(){
        $list_pessoas = Pessoa::all();
        return view('pessoas.index', [
            'pessoas' => $list_pessoas
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
}
