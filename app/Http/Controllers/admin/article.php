<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Tags;
use Input;
use File;
use Redirect;
use Session;
class article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $qArticles = Articles::all();   
        return view('admin.article.index', compact('qArticles'));
    }

    public function create(Request $request)
    {   
        $qCategories = Categories::all();
        $qTags = Tags::all();
        $articleID = $request->aID ? $request->aID : 0;
        if($articleID){
            $qArticles = Articles::where("aID",$articleID)->first();
        }else{
            $qArticles = new Articles;
        }
        return view('admin.article.create',compact('qArticles','articleID','qCategories','qTags'));
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
            $article = Articles::whereaid($request->aID)->first();

        }else{
            $article = new Articles;
            $article->aCreatedDate = date('Y-m-d H:i:s');
        }

        $file = Input::file('image');
        if(!is_null($file)){
            $destinationPath = public_path().'/assets/images/';
            $fileName = explode(".", $file->getClientOriginalName())[0];
            $fileName = $fileName.rand(1,9999).".".$file->getClientOriginalExtension();
            Input::file('image')->move($destinationPath, $fileName);
            $article->aImage = $fileName;
            if($request->cID){
                //remove file name before
            }
        }
        
        $article->aUpdatedDate = date('Y-m-d H:i:s');
        $article->aTitle = $request->title;
        $article->aDescription = $request->description;
        $article->cID = $request->category;
        $article->aContent = $request->content;
        $article->aMeta = $request->meta;
        $article->aTag = implode(",", $request->tags);
        $article->uID = Session::get("userID");
        $article->aIsActive = is_null($request->active) ? 0 : 1;
        $article->sortCode = $request->sortCode;
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
    public function destroy(Request $request)
    {
        Articles::destroy($request->aID);
        return "success" ;
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
