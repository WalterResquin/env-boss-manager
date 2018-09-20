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

class AnotacaoController extends Controller
{
    public function index()
    {
        //dd(Anotacao::all()->map(function ($anotacao){ return $anotacao->projeto(); }));

        //dd(Anotacao::with('projeto')->get());
        return view('website.anotacao.index');
    }

    public function dataTable()
    {
        $query = Anotacao::with('projeto');

//        if($response !== null )
//            $query->where('titulo','like', $response);


        return response()->json($query->get()->map(function ($anotacao){return $anotacao->toArray();}));
        //return response($query->get());
    }

    public function novo()
    {
        $projetos = Projeto::all();

        return view('website.anotacao.form')->with(['projetos' => $projetos]);
    }

    public function edtar(Request $request)
    {
        $id = $request->id;
        $anotacao = Anotacao::find($id);

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

        $anotacao->projeto_id = 1;

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