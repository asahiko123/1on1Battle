<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Log;
use Session;
use App\Services\CardImagesUploadServices;
use  App\Services\CurlSendHTTPRequestServices;


class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top()
    {

        return view('questions.top');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $url = 'https://www.amazon.co.jp/UHA%E5%91%B3%E8%A6%9A%E7%B3%96-%E7%89%B9%E6%BF%83%E3%83%9F%E3%83%AB%E3%82%AF8-2-%E6%BF%83%E9%A6%99%E3%81%84%E3%81%A1%E3%81%94-75g%C3%974%E8%A2%8B/dp/B08KXMLHM2/ref=sr_1_110?keywords=%E9%A3%B4&qid=1649769121&sr=8-110';
        // var_dump(CurlSendHTTPRequestServices::curl($url));

        if(Session::getId()){

            session()->forget('濃い味');
            session()->forget('フルーティー');
            session()->forget('酸っぱい');

        }

        $tasteList = [];
        $questions = Question::orderBy('id','desc')->get();
        $questionsCount = $questions->count();

        foreach($questions as $question){
            $sentences = $question->statement;

            if(strpos($sentences,'濃い味') !== false){
                array_push($tasteList,'濃い味');
            }
            if(strpos($sentences,'フルーティー')!== false){
                array_push($tasteList,'フルーティー');
            }
            if(strpos($sentences,'酸っぱい')!== false){
                array_push($tasteList,'酸っぱい');
            }
        }

        var_dump($tasteList);

        $tasteList_json = json_encode($tasteList);

        return view('questions.index' ,compact('questions','questionsCount','tasteList_json'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $question = new Question;

        CardImagesUploadServices::cardImagesUpload($request,$question);

        $question->statement = $request->statement;

        $question->save();

        return redirect('/admin/index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);

        CardImagesUploadServices::cardImagesUpload($request,$question);

        $question->statement = $request->statement;

        $question->save();

        return redirect('/admin/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        $question->delete();

        return redirect('/admin/index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function result()
    {

        return view('questions.result');

    }




}
