<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Navigators;
use App\Http\Controller\admin\article;
use App;
use Input;
use File;
use Redirect;
use Session;
class Navigator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   
        $qNavigator = Navigators::all();
        return view('admin.navigator.index', compact('qNavigator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        if($request->navID && is_numeric($request->navID))
        {
            $navigator = Navigators::where('navID', $request->navID)->first();
        }
        else
        {
            $navigator = new Navigators;
        }
        return view('admin.navigator.create1', compact('navigator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->navID)
        {
            $navigator = Navigators::where("navID", $request->navID)->first();
        }
        else
        {
            $navigator = new Navigators;
        }

        $navigator->navName = $request->name;  
        $navigator->navUrl = $request->url;  
        $navigator->navActive = $request->active ? 1 : 0;  
        $navigator->navSortCode = $request->sortCode;
        $navigator->save();
        echo "success";
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
    public function destroy(Request $request)
    {
        Navigators::destroy($request->navID);
        return "success" ;
    }
}
