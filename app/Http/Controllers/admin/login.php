<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Redirect;
use Session;

class login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {   
        $message = is_null($request->error) ? "" : "Login failed !";
        return view('admin.login2',compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function auth(Request $request)
    {
        // dd($request);
        $result = Users::where('uUsername', $request->username)->where('uPassword', md5($request->password))->first();
        if($result){
            Session::put('userID', $result['uID']);
            Session::put('username', $result['uUsername']);
            Session::put('role', $result['uRole']);
            /*
            * if( !is_null($request->remember) )
            * store cookie here 
            */
            return redirect('/admin/category');
        }else{
            $error = 1;
            return Redirect::action('admin\login@index',compact('error'));
        }
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
