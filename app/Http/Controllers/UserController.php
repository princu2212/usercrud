<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $data = DB::table('users')
                    ->whereBetween('date_of_birth', array($request->from_date, $request->to_date))
                    ->get();
            } else {
                $data = DB::table('users')
                    ->get();
            }
            return datatables()->of($data)->make(true);
        }
        return view('index');
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
            'date_of_birth' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->date_of_birth = $request->date_of_birth;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/')->with('status', 'User Added Successfully!!');
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
        $user->date_of_birth = $request->date_of_birth;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect('/')->with('status', 'User Updated Successfully!!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/');
    }
}
