<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        $user="Mohammad";

        return view("dashboard.index",["user"=>$user,"index"=>"Hi"]);
    }
}
