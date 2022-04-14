<?php

namespace App\Services;

use App\Services\FileUploadServices;
use App\Services\CheckExtensionServices;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;


class CardImagesUploadServices{

    public static function cardImagesUpload(Request $request,$question){

        if(!is_null($request['card_image'])){
            $imageFile = $request['card_image'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension,$fileNameToStore,$fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData,$extension);

            $image = Image::make($data_url);

            $image->resize(400,400)->save(storage_path(). '/app/public/images/' . $fileNameToStore);

            $question->card_image = $fileNameToStore;
        }
    }
}