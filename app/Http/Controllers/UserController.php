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
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',

        ], [
                'name.required' => 'Kullanıcı Adı bilgisini giriniz.',
                'email.required' => 'E-mail bilgisini giriniz.',
                'password.required' => 'Parola giriniz.',
                'confirm_password.required' => 'Parola tekrar giriniz.'
            ]);

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

    //for delete user
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::back()->with('success', 'Kullanıcı silinmiştir.');
    }

    //create user
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',

        ], [
                'name.required' => 'Kullanıcı Adı bilgisini giriniz.',
                'email.required' => 'E-mail bilgisini giriniz.',
                'password.required' => 'Parola giriniz.',
                'confirm_password.required' => 'Parola tekrar giriniz.'
            ]);


        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        $confirm_password = $request->get('confirm_password');
        if ($password == $confirm_password) {
            $user->password = bcrypt($password);
            $user->save();
            return redirect()->to('/users')->with('success', 'Kullanıcı başarıyla eklendi.');
        } else {
            return Redirect::back()->with('fail', 'Kayıt işlemi başarısız.');
        }


    }
}