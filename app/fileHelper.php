<?php

if(!function_exists('upload_file')){
    function upload_file($request, $fileLocation)
    {
        // dd($request->file('file'));
        if(isset($request->file)){
            $f = $request->file('file');
            $fileExtension = $f->getClientOriginalExtension(); //jpeg 
        }
        // else{
        //     $fileExtension = $request->getClientOriginalExtension();
        // }
        $fileName = md5(time() . rand()); //234234ASDF234asdf2
        $fileName .= "." . $fileExtension;

        if (!file_exists(storage_path($fileLocation))) {
            mkdir(storage_path($fileLocation), 0777, true);
        }

        if(isset($request->file)){
            $f->move(storage_path($fileLocation) . DIRECTORY_SEPARATOR, $fileName);
        }
        // else{
        //     $request->move(storage_path($fileLocation) . DIRECTORY_SEPARATOR, $fileName);
        // }

        return $fileName;
    }

}