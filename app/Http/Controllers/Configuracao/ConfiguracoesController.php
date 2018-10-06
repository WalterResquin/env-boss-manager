<?php
/**
 * Created by PhpStorm.
 * User: Webeleven
 * Date: 24/09/2018
 * Time: 10:38
 */

namespace App\Http\Controllers\Configuracao;


use App\Domain\Configuracao\Configuracao;
use App\Domain\Projeto\Projeto;
use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarConfiguracaoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfiguracoesController extends Controller
{

    public function index()
    {
        return view('website.configuracao.index');
    }

    public function dataTable()
    {

        $configuracoesResponse = [];

        $projetos = Auth::user()->projetos()->get();

        $configuracaoPorProjeto = $projetos->map(function ($projeto){
            return $projeto->configuracoes()->get();
        });

        foreach ($configuracaoPorProjeto as $configuracoes)
        {
            foreach ($configuracoes as $configuracao)
            {
                array_push($configuracoesResponse, $configuracao);
            }
        }

        return response()->json($configuracoesResponse);
    }

    public function novo()
    {
        $projetos = Auth::user()->projetos()->get();

        return view('website.configuracao.form')->with(['projetos' => $projetos]);
    }

    public function edtar(Request $request)
    {
        $id = $request->id;
        $configuracao = Configuracao::find($id);

        $projetos = Auth::user()->projetos()->get();

        return view('website.configuracao.form')->with(['projetos' => $projetos, 'configuracao' => $configuracao]);
    }

    public function salvar(Request $request)
    {
//        $file = $request->file('midia');
//
//        $tempName = $file->getPathname();
//        $name = $file->getClientOriginalName();



        if($request->id){
            $configuracao = Configuracao::find($request->id)->first();
        }
        else {
            $array = ['titulo' => $request->titulo, 'configuracao' => $request->descricao];

            $configuracao= Configuracao::find($array)->first();
            if($configuracao == null)
                $configuracao = new Configuracao();
        }
        $configuracao->fill($request->all());
        $configuracao->save();

        return view('website.configuracao.index');
    }

    public function deletar(Request $request)
    {
        $id = $request["id"];
        $configuracao = Configuracao::find($id);
        $configuracao->delete();

        return view('website.configuracao.index');
    }

}