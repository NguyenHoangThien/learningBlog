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
       
        $params = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $result = Users::authentication($params);
        if($result) {
            $sessionParams = [
                'userID'    => $result->uID,
                'username'  => $result->uUsername,
                'role'      => $result->uRole
            ];


            $this->setSessionForUser($sessionParams);
            redirect('admin/category');
            // $this->redirectAdminPage();
            return redirect('admin/category');
            
        } else {

            $error = 1;
            return Redirect::action('admin\login@index', compact('error'));
        }
    }

    public function redirectAdminPage() 
    {
        $rememberPath = Session::get('rememberPath');

        if(empty($rememberPath)) {

            return redirect('admin/category');
        } else {
            // clear rememberPath
            Session::put('rememberPath', '');

            return redirect($rememberPath);
        }
    }

    public function setSessionForUser($params) 
    {
        foreach ($params as $key => $value) {
            Session::put($key, $value);
        }
    }

}
