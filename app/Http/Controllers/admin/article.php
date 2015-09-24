<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use Input;
use File;
use Redirect;
class article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $qArticles = Articles::all();   
        return view('admin.categories',compact('qArticles'));
    }

    public function create(Request $request)
    {
        $qArticles = new Articles ;
        $articleID = $request->aID ? $request->aID : 0;
        if($articleID){
            $qArticles = Articles::where("aID",$articleID)->first();
        }else{
            $qArticles = new Articles;
        }
        return view('admin.article.create',compact('qArticles','articleID'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->aID){
            $article = Categories::where(whereaID($request->aID));
        }else{
            $article = new Categories;
        }

        $file = Input::file('image');
        $destinationPath = public_path().'/assets/images/';
        $fileName = explode(".", $file->getClientOriginalName())[0];
        $fileName = $fileName.rand(1,9999).".".$file->getClientOriginalExtension();
        Input::file('image')->move($destinationPath, $fileName);
        $article->aTitle = $request->title;
        $article->aDescription = $request->description;
        $article->cParentID = $request->articleParent;
        $article->cName = $request->cName;
        if(!is_null($file)){
            $article->aImage = $fileName;
            if($request->cID){
                //remove file name before
            }
        }
        $article->save();
        return Redirect::action('admin\article@index');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

   
}
