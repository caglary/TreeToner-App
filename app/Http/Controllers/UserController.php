<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function edit()
    {

        return view('users.edit');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function update(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
       
        $password = $request->get('password');
        $confirm_password = $request->get('confirm_password');

        if ($password == $confirm_password && $password != "" && $confirm_password != "") {
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));

            $user->save();
            return Redirect::to('/users')->with('success', 'Güncelleme işlemi başarılı.');

        } else {

            return Redirect::back()->with('fail', 'Güncelleme işlemi başarısız.');

            
        }




    }
}