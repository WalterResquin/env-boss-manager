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

class ConfiguracoesController extends Controller
{

    public function index()
    {
        return view('website.configuracao.index');
    }

    public function dataTable()
    {
        $query = Configuracao::with('projeto');

//        if($response !== null )
//            $query->where('titulo','like', $response);


        return response()->json($query->get()->map(function ($configuracao){return $configuracao->toArray();}));
    }

    public function novo()
    {
        $projetos = Projeto::all();

        return view('website.configuracao.form')->with(['projetos' => $projetos]);
    }

    public function edtar(Request $request)
    {
        $id = $request->id;
        $configuracao = Configuracao::find($id);

        $projetos = Projeto::all();

        return view('website.configuracao.form')->with(['projetos' => $projetos, 'configuracao' => $configuracao]);
    }

    public function salvar(SalvarConfiguracaoRequest $request)
    {
        $file = $request->file('midia');

        $tempName = $file->getPathname();
        $name = $file->getClientOriginalName();



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