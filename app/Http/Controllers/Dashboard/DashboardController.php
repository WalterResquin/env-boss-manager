<?php
/**
 * Created by PhpStorm.
 * User: Webeleven
 * Date: 17/09/2018
 * Time: 13:30
 */

namespace App\Http\Controllers\Dashboard;


use App\Domain\Anotacao\Anotacao;
use App\Domain\Configuracao\Configuracao;
use App\Domain\Projeto\Projeto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $projetos_cont = Auth::user()->projetos()->get();

        $quant_anota = 0;
        $quant_conf = 0;

        foreach ($projetos_cont as $projeto)
        {
            $quant_anota+= $projeto->anotacoes->count();
            $quant_conf+= $projeto->configuracoes->count();

        }


        $quant_proj = Auth::user()->projetos()->count();


        $projetos = Auth::user()->projetos()->get();


        return view("website.dashboard.index")->with(['quant_proj' => $quant_proj,
                                                            'quant_anota' => $quant_anota,
                                                            'quant_conf' => $quant_conf,
                                                            'projetos' => $projetos]);
    }
}