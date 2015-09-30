<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tags;
use Redirect;
class tag extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $qTags = Tags::all();   
        return view('admin.tags',compact('qTags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if($request->tID){
            $tag = Tags::wheretid($request->tID)->first();
        }else{
            $tag = new Tags;
        }
        $tag->tName        = $request->tName;
        $tag->tDescription = $request->tDes;
        $tag->tIsActive    = is_null($request->active) ? 0 : 1;
        $tag->save();
        return Redirect::action('admin\tag@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        Tags::destroy($request->tID);
        return "success";
    }
}
