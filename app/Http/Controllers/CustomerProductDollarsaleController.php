<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reports\SalesByCustomer;

class CustomerProductDollarsaleController extends Controller
{
  public function __contruct () {
      $this->middleware("guest");
  }
  public function index () {
      $report = new SalesByCustomer;
      $report->run();
      return view("report",["report"=>$report]);
  }
}
