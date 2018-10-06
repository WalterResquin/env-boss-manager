<?php
/**
 * Created by PhpStorm.
 * User: Webeleven
 * Date: 20/09/2018
 * Time: 11:01
 */

namespace App\Http\Controllers\Anotacao;


use App\Domain\Anotacao\Anotacao;
use App\Domain\Projeto\Projeto;
use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarAnotacaoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class AnotacaoController extends Controller
{
    public function index()
    {

        return view('website.anotacao.index');
    }

    public function dataTable()
    {
        $anotacoesResponse = [];

        $projetos = Auth::user()->projetos()->get();

        $anotacoesPorProjeto = $projetos->map(function ($projeto){
            return $projeto->anotacoes()->get();
        });

        foreach ($anotacoesPorProjeto as $anotacoes)
        {
            foreach ($anotacoes as $anotacao)
            {
                array_push($anotacoesResponse, $anotacao);
            }
        }

        return response()->json($anotacoesResponse);
    }

    public function novo()
    {
        $projetos = Auth::user()->projetos()->get();

        return view('website.anotacao.form')->with(['projetos' => $projetos]);
    }

    public function edtar(Request $request)
    {
        $id = $request->id;
        $anotacao = Auth::user()->projetos()->get();

        $projetos = Projeto::all();

        return view('website.anotacao.form')->with(['projetos' => $projetos, 'anotacao' => $anotacao]);
    }

    public function salvar(SalvarAnotacaoRequest $request)
    {

        if($request->id){
            $anotacao = Anotacao::find($request->id)->first();
        }
        else {
            $array = ['titulo' => $request->titulo, 'descricao' => $request->descricao];

            $anotacao = Anotacao::find($array)->first();
            if($anotacao == null)
                $anotacao = new Anotacao();
        }

        //dd($anotacao);

        $anotacao->fill($request->all());

        $anotacao->saveOrFail();

        return view('website.anotacao.index');
    }

    public function deletar(Request $request)
    {
        $id = $request["id"];
        $projeto = Anotacao::find($id);

        $projeto->delete();

        return view('website.anotacao.index');
    }
}