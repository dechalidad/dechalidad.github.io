<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    public function index()
    {
        return view('page/login');
    }

    public function authentication(Request $request)
    {
        $post = $request->only('username', 'password');

        $data = Login::where($post)->first();

        if ($data == null) {
            return redirect(url('/login-admin'))->with('status', 'Failed to Login');
        } else {
            $request->session()->put('admin', [
                'id_user' => $data->id,
                'name' => $data->name,
                'id_role' => $data->id_role
            ]);

            return redirect(url('dashboard'))->with('status', 'Login Success');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(url('/login-admin'));
    }
}
