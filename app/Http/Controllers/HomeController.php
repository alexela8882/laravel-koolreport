<?php

namespace App\Http\Controllers;

use App\Reports\MyReport;

class HomeController extends Controller
{
    public function __contruct () {
        $this->middleware("guest");
    }
    public function index () {
        $report = new MyReport;
        $report->run();
        return view("report",["report"=>$report]);
    }
}