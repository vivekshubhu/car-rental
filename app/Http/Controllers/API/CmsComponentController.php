<?php

namespace App\Http\Controllers\API;

use App\CmsComponent;
use App\CmsPage;
use App\ComponentPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CmsComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $rules =[
            'name' => 'required|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            // dd($validator->errors());
            return response()->json($validator->errors(), 400);
        }
        $page = CmsPage::find($request->pageId);
        // dd($request->pageId);
        if($page->components){
            $components = $page->components->toArray();
            $filter = array_filter($components, function($component) use($request) {
                return $component['name']==$request->name;
            });
        }
        // dd($filter); 
        if(count($filter)) {
            return response()->json(['message' => 'The name has already been  taken'], 400);
        }
        $component = CmsComponent::create([
            "name" => $request->name,
        ]);

        $component_page = ComponentPage::create([
            "seq_no" => $request->seq_no,
            "page_id" => $request->pageId,
            "component_id" => $component->id,
        ]);

        return response()->json(['message'=>'component Created Successfully'],200);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
        // dd($request->all());
        $componentPage = ComponentPage::where('page_id', $request->pageId)->where('component_id', $id)->first();
        $componentPage->delete();
        $component = CmsComponent::find($id);
        $component->delete();
        return response()->json(['message' => 'deleted successfully']);
    }
}
