<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('index', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'date_of_birth' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->status = $request->status;
        $user->password = $request->password;
        $user->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->status = $request->status;
        $user->password = $request->password;
        $user->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/');
    }

}
