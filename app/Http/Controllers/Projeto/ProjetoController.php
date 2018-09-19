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
}