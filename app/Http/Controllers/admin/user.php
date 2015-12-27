<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Input;
use File;
use Redirect;
use Image;


class user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $qUsers = Users::all();
        return view('admin.user.index',compact('qUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        // $file = Input::file('/Koala.jpg');
        // $image = Image::make($file->getRealPath())->resize('200','200')->save($filename);

        // $image = Image::make('/Koala.jpg')->resize(300, 200);
        // $image = Image::make('/Koala.jpg')->save('/user/ImageName.png');
        // $img = Image::make(public_path().'/Koala.jpg');
        // $img->resize(300,200)->save(public_path().'/Koala1.jpg');
        // dd($img);
        $qUsers = new Users ;
        $userID = $request->uID ? $request->uID : 0;
        if($userID){
            $qUsers = Users::where("uID",$userID)->first();
        }else{
            $qUsers = new Users;
        }
        return view('admin.user.create',compact('qUsers','userID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->userID){
            $user = Users::where("uID", $request->userID)->first();
            if($request->password){
                $user->uPassword       = md5($request->password);
            }
        }else{
            $user = new Users;
            $user->uPassword       = md5($request->password);
            $user->uRegisteredDate = date('Y-m-d');
            $user->uIsActive       = 1;
            $user->uRole           = 1;
            $user->uUsername       = $request->username;
            $user->uEmail          = $request->email ;
        }

        $user->uBirthday       = date('Y-m-d',strtotime($request->birthday));
        $user->uAddress        = $request->address;
        $user->uPhone          = $request->phone;

        $file = Input::file('image');
        // $file->getRealPath()
        if(!is_null($file)){
            $destinationPath = public_path().'/assets/images/avatar/';
            $fileName = explode(".", $file->getClientOriginalName())[0];
            $fileName = $fileName.rand(1,9999).".".$file->getClientOriginalExtension();
            Input::file('image')->move($destinationPath, $fileName);
            Image::make($destinationPath . $fileName)->resize(400, 400)
                                            ->save($destinationPath . '400x400/' . $fileName);
            $user->uAvatar   = $fileName;
        }
        $user->save();
        return Redirect::action('admin\user@index');
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
