<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candy;
use Log;

class ReactionController extends Controller
{
    public function create(Request $request){

        $category = $request->category;
        $like_status = $request->status;

        $candy_list = array();

       if($like_status === 'like'){
           $selectCandy = Candy::where('style',$category)->get();

           session([$category => $selectCandy]);

           Log::debug($selectCandy);
          
       }else{
           print_r('嫌いなキャンディーは選ばない');
       }
       
    // return view('questions.index' ,compact('selectCandy'));

    }
}
