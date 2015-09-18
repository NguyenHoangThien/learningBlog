<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Roles;
use Redirect;
class role extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $qRoles = Roles::all();   
        return view('admin.categories',compact('qRoles'));
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
        if($request->rID){
            $role = Roles::where(whererID($request->rID));
        }else{
            $role = new Roles;
        }
        $role->rName = $request->rName;
        $role->rDescription = $request->rDes;
        $role->save();
        return Redirect::action('admin\role@index');
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
        $request   = Request::all();
        Roles::destroy($request->rID);
        return "success";
    }
}
