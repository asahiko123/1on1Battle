<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    
    public function show($id){

        $user = User::findorFail($id);

        return view('users.show',compact('user'));
    }

    public function edit($id){

        $user = User::findOrFail($id);

        return view('users.edit',compact('user'));
    }

    public function update(Request $request,$id){

        $user = User::findOrFail($id);

        if(!is_null($request['profile_img'])){
            $imageFile = $request['profile_img'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension,$fileNameToStore,$fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData,$extension);

            $image = Image::make($data_url);

            $image->resize(400,400)->save(storage_path(). '/app/public/images/'. $fileNameToStore);

            $user->profile_img = $fileNameToStore;


        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->self_introduction = $request->self_introduction;

        $user->save();

        return redirect('home');
    }
}
