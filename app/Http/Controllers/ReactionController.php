<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candy;
use Log;
use Session;

class ReactionController extends Controller
{

    public function index(){

        $candy = Candy::all();

        return response()->json(['candy' => $candy]);
    }
    public function create(Request $request){

        $category = $request->category;
        $like_status = $request->status;

        $candy_list = array();

       if($like_status === 'like'){
           $selectCandy = Candy::where('style',$category)->get();

           session([$category => $selectCandy]);


           Log::debug($selectCandy);

       }

       return response()->json([$category => $selectCandy]);

    }

}
