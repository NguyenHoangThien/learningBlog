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
        $qRoles = Roles::all();   
        return view('admin.roles',compact('qRoles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->rID){
            $role = Roles::where("rID",$request->rID)->first();
        }else{
            $role = new Roles;
        }
        $role->rName        = $request->rName;
        $role->rDescription = $request->rDes;
        $role->rIsActive    = is_null($request->active) ? 0 : 1;
        $role->save();
        return Redirect::action('admin\role@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        Roles::destroy($request->rID);
        return "success" ;
    }
}
