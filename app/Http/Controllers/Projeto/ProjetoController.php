<?php
/**
 * Created by PhpStorm.
 * User: Webeleven
 * Date: 17/09/2018
 * Time: 16:25
 */

namespace App\Http\Controllers\Projeto;


use App\Domain\Projeto\Projeto;
use App\Http\Controllers\Controller;
use App\Http\Requests\SalvarProjetoRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    public function index ()
    {
        return view('website.projeto.index');
    }


    public function dataTable()
    {
        return response(Projeto::all());
    }

    public function novo()
    {
        return view('website.projeto.form');
    }

    public function edtar(Request $request)
    {
        $id = $request->id;
        $projeto = Projeto::find($id);

        return view('website.projeto.form')->with(['projeto' => $projeto]);
    }

    public function salvar(SalvarProjetoRequest $request)
    {
        if($request->id){
            $projeto = Projeto::find($request->id)->first();
        }
        else {
            $array = ['titulo' => $request->titulo, 'descricao' => $request->descricao];

            $projeto = Projeto::find($array)->first();
            if($projeto == null)
                $projeto = new Projeto();
        }
        $projeto->fill($request->all());
        $projeto->saveOrFail();

        return view('website.projeto.index');
    }

    public function deletar(Request $request)
    {
        $id = $request["id"];
        $projeto = Projeto::find($id);
        $projeto->delete();

        return view('website.projeto.index');
    }
}