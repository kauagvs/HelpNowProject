<?php

namespace HelpNow\Http\Controllers;

use Illuminate\Http\Request;
use HelpNow\ProblemaCadastro;
use Illuminate\Support\Facedes\Redirect;
use HelpNow\Http\Requests\ProblemaFormRequest;
use DB;

class ProblemaController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        if ($request) {
            $query=trim($request->get('searchText'));
            $problemas=DB::table('problema_cadastro')
            ->where('problema', 'LIKE', '%'.$query.'%')
            ->where('status', '=', 'ativo')
            ->orderBy('idproblema', 'desc')
            ->paginate(7);
            return view('problema.listar_cadastro', [
                'problemas'=>$problemas, 'searchText'=>$query
            ]);
        }
    }


    public function create('problema.listar_cadastro.create')
    {
        //
    }


    public function store(ProblemaFormRequest $request)
    {
        $problema = new ProblemaCadastro;
        $problema->problema=$request->get('problema');
        $problema->descricao=$request->get('descricao');
        $problema->status=$request->get('status');
        $problema->ativo=1;
        $problema->save();
        return Redirect::to('problema/listar_cadastro');
    }


    public function show($id)
    {
        return view('problema.listar_cadastro.show', [
            'problema' =>ProblemaCadastro::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('problema.listar_cadastro.edit', [
            'problema' =>ProblemaCadastro::findOrFail($id)
        ]);
    }


    public function update(ProblemaFormRequest $request, $id)
    {
        $problema=ProblemaCadastro::findOrFail($id);
        $problema->problema=$request->get('problema');
        $problema->descricao=$request->get('descricao');
        $problema->status=$request->get('status');
        $problema->update();
        return Redirect::to('problema/listar_cadastro');
    }

    public function destroy($id)
    {
        $problema=ProblemaCadastro::findOrFail($id);
        $problema->problema=$request->get('problema');
        $problema->ativo='0';
        $problema->update();
        return Redirect::to('problema/listar_cadastro');
    }
}
