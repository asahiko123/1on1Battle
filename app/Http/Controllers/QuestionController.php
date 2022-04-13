<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Services\FileUploadServices;
use App\Services\CheckExtensionServices;
use Intervention\Image\Facades\Image;


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
        $questions = Question::all();

        return view('questions.index' ,compact('questions'));
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

        if(!is_null($request['card_image'])){
            $imageFile = $request['card_image'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension,$fileNameToStore,$fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData,$extension);

            $image = Image::make($data_url);

            $image->resize(400,400)->save(storage_path(). '/app/public/images/' . $fileNameToStore);

            $question->card_image = $fileNameToStore;
        }

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

        if(!is_null($request['card_image'])){
            $imageFile = $request['card_image'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension,$fileNameToStore,$fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData,$extension);

            $image = Image::make($data_url);

            $image->resize(400,400)->save(storage_path(). '/app/public/images/' . $fileNameToStore);

            $question->card_image = $fileNameToStore;
        }

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
        //
    }
}
