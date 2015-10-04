<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Tags;

class home extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) 
    {
        //
        $offset = 3;
        if(is_null($request->page) || !$request->page){
            $page = 1;
        }else{
            $page = $request->page;
        }
        $from = ( $page - 1 ) * $offset;
        $to = $from + $offset;
        $total = Articles::where('aIsActive',1)->get()->count();
        $qGetTags = Tags::all();
        $qGetCategories = Categories::where('cID','!=',1)->get();
        $qGetArticles = Articles::where('aIsActive',1)
                                ->leftJoin('categories', 'categories.cID', '=', 'articles.cID')
                                ->leftJoin('users','users.uID','=','articles.uID')
                                ->orderBy('articles.aCreatedDate','DESC')
                                ->skip($from)->take($to)
                                ->get();
        // dd($total);
        return view('user.index', compact('qGetTags', 'qGetCategories', 'qGetArticles', 'total', 'page', 'offset'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function post(Request $request)
    {
        if(is_null($request->a) || !$request->a){
            //throw it in to page 404
        }else{
            $qGetTags = Tags::all();
            $qGetCategories = Categories::where('cID','!=',1)->get();

        }
        $qArticle = Articles::where('aIsActive',1)->where('aID',$request->a)
                                ->leftJoin('categories', 'categories.cID', '=', 'articles.cID')
                                ->leftJoin('users','users.uID','=','articles.uID')
                                ->first();
        // dd($total);
        return view('user.show-post', compact('qGetTags', 'qGetCategories', 'qArticle'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function contact()
    {
        //
        return view('user.contact');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
