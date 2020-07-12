<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmsPage;
use Validator;

class CmsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(CmsPage::all(), 200);

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
            $rules =[
                'name' => 'required|unique:cms_pages|max:255',
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()) {
                // dd($validator->errors());
                return response()->json($validator->errors(), 400);
            }
            $page = CmsPage::create($request->all());
            return response()->json(['success'=>'Page Created Successfully'],200);
            // return response()->json([
            //     'status' => 'error',
            //     'msg'    => 'Error',
            //     'errors' => $exception->errors(),
            // ], 422);
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
        $page = CmsPage::find($id);
        $components = $page->components;
        return response()->json($components, 200);
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
        //
        $rules =[
            'name' => 'required|unique:cms_pages|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            // dd($validator->errors());
            return response()->json($validator->errors(), 400);
        }
        $page = CmsPage::find($id);
        $page->update($request->all());
        return response()->json(["message" => "updated successfully", "page" => $page]);

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
        $page = CmsPage::find($id);
        if(!$page) {
            return response()->json(["message" => "record not found"]);
        }
        $page->delete();
        return response()->json(["message" => "deleted successfully"]);
    }

    // public function validatePage ($request) {
    //     // dd($request->all());
       
    // }
}
