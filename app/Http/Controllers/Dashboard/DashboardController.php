<?php
/**
 * Created by PhpStorm.
 * User: Webeleven
 * Date: 17/09/2018
 * Time: 13:30
 */

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view("website.dashboard.index");
    }
}