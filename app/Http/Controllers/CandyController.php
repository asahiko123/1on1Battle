<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candy;

class CandyController extends Controller
{
    public function index(){

        $candies = Candy::all();

        return view('candy.index',compact('candies'));
    }

    public function edit($id){

        $candy = Candy::find($id);

        return view('candy.edit',compact('candy'));
    }

    public function store(Request $request){


    }
}
