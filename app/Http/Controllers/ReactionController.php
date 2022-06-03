<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candy;
use Log;
use Session;
use  App\Services\CurlSendHTTPRequestServices;

class ReactionController extends Controller
{

    public function create(Request $request){

        $category = $request->category;
        $like_status = $request->status;

        $candy_list = array();

       if($like_status === 'like'){

           $selectCandy = Candy::where('tag','like',"%$category%")->get();


        //    Log::debug($selectCandy);

       }else{

            $selectCandy = null;
       }


       return response()->json([$category => $selectCandy]);

    }


    public function scrape(Request $request){

        $url = $request->url;
        $name = $request->name;

        $image = CurlSendHTTPRequestServices::curl($url);

        return response()->json([$name => $image]);
    }

}
