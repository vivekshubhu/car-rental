<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CmsPost;
use App\CmsFile;

use Validator;

class postController extends Controller
{
    //
    // public function addPage(Request $request) {
    //     // dd($request->all());
    //     try {
    //         $validatedData = $request->validate([
    //             'name' => 'required|unique:cms_pages|max:255',
    //         ]);
    //         $page = CmsPage::create($request->all());
    //         return response(['success'=>'Page Created Successfully'],200);
    //     }
    //     catch (ValidationException $exception) {
    //         dd($exception->errors());
    //         return response()->json([
    //             'status' => 'error',
    //             'msg'    => 'Error',
    //             'errors' => $exception->errors(),
    //         ], 422);
    //     }
    // }
    // public function getPages() {
    //     return $pages = CmsPage::all();
    // }

    public function getComponents() {
        $components = [];
        if (is_dir(base_path("resources\\views\\frontend\\components"))) {

            $comps = scandir(base_path("resources\\views\\frontend\\components"));
            // dd($comps);

            foreach ($comps as $key => $value) {
                // dd($key, $value);
                if (strpos($value, '.blade.php')) {
                    $no_ext = explode('.', $value)[0];
                    $sep = explode('-', $no_ext);
                    $file_name = implode(' ', $sep);
                    $components[$key] = $file_name;
                }
            }
        }
        // dd($components);

        $components = array_map(function($val) {
            // dd($val);
           return ucwords($val);
        }, $components);
        return response()->json($components);
    }

    public function getPostsImage() {
        $filename = $_GET['filename'];
        // dd($filename);

        // dd($filename);
        if(file_exists(storage_path('/Cms/Post/'.$filename))){
            return response()->file(storage_path('/Cms/Post/'.$filename));
        }else{
            throw new \Exception("The file doesn't exists in our system");
        }
    }

    public function updatePost(Request $request, $id){
        //    
        $data = json_decode($request->data, true);
        unset($data['file_name']); 
        // dd($data);
        $rules =[
            'heading' => 'required',
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            // dd($validator->errors());
            return response()->json($validator->errors(), 400);
        }
        $post = CmsPost::find($id);
        // dd($post->file);
        $post->update($data);
        if($request->file){
            // dd($post->file);
            if($post->file) {
                $fileName = upload_file($request, 'Cms/Post');
                $post->file->update([
                    'name' => $fileName,
                ]); 
            } else {
                 $fileName = upload_file($request, 'Cms/Post');
                CmsFile::create([
                    'type' => 'file',
                    'table_name' => 'cms_posts',
                    'table_id' => $post->id,
                    'name' => $fileName,
                ]); 
            }
           
        }
        // dd($post);
        return response()->json(["message" => "updated successfully"]);
    }
}
