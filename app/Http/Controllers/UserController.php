<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
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
    // public function select(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::select('*');
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('status', function ($row) {
    //                 if ($row->status) {
    //                     return '<span class="badge bg-primary">Active</span>';
    //                 } else {
    //                     return '<span class="badge bg-danger">In Active</span>';
    //                 }
    //             })
    //             ->filter(function ($instance) use ($request) {
    //                 if ($request->get('status') == 'Active' || $request->get('status') == 'In Active') {
    //                     $instance->where('status', $request->get('status'));
    //                 }
    //             })
    //             ->rawColumns(['status'])
    //             ->make(true);
    //     }
    // }
}
