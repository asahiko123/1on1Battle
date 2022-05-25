<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candy;
use App\Category;

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

        
        $candy = new Candy;

        $candy->name = $request->name;
        $candy->maker = $request->maker;
        $candy->url = $request->url;
        $candy->tag = $request->tag;
        $candy->style = "aaa";
        $candy->taste = "bbb";

        $candy->save();

        $input_tag = $request->tag;
    

        if(isset($input_tag)){
            $tags_id = [];
            $tags = explode('#',$input_tag);

            foreach($tags as $tag){
                $tag = Category::updateOrCreate([
                    'category' => $tag,
                ]);

                $tag_ids[] = $tag->id;//中間テーブルに格納用のタグid
            }

            $candy->category()->attach($tag_ids);

        }

        return redirect('admin/candy/index');

    }
}
