<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    use SoftDeletes;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('home')->with(compact('users'));
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('edit')->with(compact('users'));
    }
    public function save($id, Request $request)
    {
        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->admin
            ]);
            return redirect('home');
    }
    public function delete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('home');
    }
    public function newuser()
    {
        return view('newUser');
    }
    public function add(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('home');
    }
}
