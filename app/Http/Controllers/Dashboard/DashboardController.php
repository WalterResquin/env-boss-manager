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

class DashboardController extends Controller
{
    public function index(){

        $quant_proj = Projeto::count();
        $quant_anota = Anotacao::count();
        $quant_conf = Configuracao::count();

        $projetos = Projeto::with('configuracoes')->with('anotacoes')->get();

        return view("website.dashboard.index")->with(['quant_proj' => $quant_proj,
                                                            'quant_anota' => $quant_anota,
                                                            'quant_conf' => $quant_conf,
                                                            'projetos' => $projetos]);
    }
}