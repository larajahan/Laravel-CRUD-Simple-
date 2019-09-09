<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OurController extends Controller
{
  public function anik(){

    $all_users=User::all();
    return view('service',compact('all_users'));

  }

}
