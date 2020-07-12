<?php

namespace App\Http\Controllers\API;

use App\CmsPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPost;
use App\CmsFile;
use Validator;

class CmsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd($request->component_name);
        $posts = CmsPost::where('component_name', $request->component_name)->get();
        return response()->json($posts, 200);

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
        //
        // dd(json_decode($request->data));
        // dd($request->all());
        $data = json_decode($request->data, true);
        $rules =[
            'heading' => 'required',
        ];
        $validator = Validator::make($data, $rules);
        if($validator->fails()) {
            // dd($validator->errors());
            return response()->json($validator->errors(), 400);
        }

        $post = CmsPost::create($data);

        if($request->file) {
            $fileName = upload_file($request, 'Cms/Post');
            CmsFile::create([
                'type' => 'file',
                'table_name' => 'cms_posts',
                'table_id' => $post->id,
                'name' => $fileName,
            ]); 
        }
        return response()->json(['message'=>'Post Created Successfully'],200);
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
        $post = CmsPost::find($id);
      
        $filteredPost = $post->only([ 'type', 'heading', 'sub_heading', 'title', 'sub_title', 'highlight', 
        'content', 'description', 'short_description', 'amount',]);
        if($post->file) {
            $fileName = $post->file->name;
            $filteredPost['file_name'] = $fileName;
        }
        return response()->json($filteredPost, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // //
        // dd($request->all());
        // $rules =[
        //     'heading' => 'required',
        // ];
        // $validator = Validator::make($request->all(), $rules);
        // if($validator->fails()) {
        //     // dd($validator->errors());
        //     return response()->json($validator->errors(), 400);
        // }
        // $post = CmsPost::find($id);
        // // dd($post->file);
        // $post -> update($request->all());
        // // dd($post);
        // return response()->json(["message" => "updated successfully"]);
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
        $post = CmsPost::find($id);
        $post->delete();
        return response()->json(["message" => "Post deleted successfully"]);
    }
}
