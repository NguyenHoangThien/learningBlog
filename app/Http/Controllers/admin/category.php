<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Input;
use File;
use Redirect;
class category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $qGetCategories = Categories::all();   
        return view('admin.categories',compact('qGetCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
        if($request->cID){
            echo("edit") , $request['cID'];
        }else{
            $category = new Categories;
            $file = Input::file('image');
            $destinationPath = public_path().'/assets/images/';
            $fileName = explode(".", $file->getClientOriginalName())[0];
            $fileName = $fileName.rand(1,9999).".".$file->getClientOriginalExtension();
            Input::file('image')->move($destinationPath, $fileName);
            $category->cName = $request->cName;
            $category->cDescription = $request->cDes;
            $category->cParentID = $request->categoryParent;
            $category->cName = $request->cName;
            $category->cIcon = $fileName;
            $category->save();
        }

        return Redirect::action('admin\category@index');
        /* https://laracasts.com/discuss/channels/general-discussion/laravel-5-image-upload-and-resize?page=1
        *  Link upload and resize image
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }



    
    
}
