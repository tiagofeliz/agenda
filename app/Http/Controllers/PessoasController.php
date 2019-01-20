<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function index(){
        $list_pessoas = Pessoa::all();
        return view('pessoas.index', [
            'pessoas' => $list_pessoas
        ]);
    }

    public function create(){
        return view('pessoas.create');
    }

    public function new(Request $request){
        Pessoa::create($request->all());
        return redirect('/pessoas')->with("message", "Contato cadastrado com sucesso.");
    }
}
