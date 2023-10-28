<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB; // import vào để chạy db
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }
    public function index2()
    {
        $users = DB::table('users')->get();
        return view('dashboardtext', ['users' => $users]);
    }


    public function phanTrang()
    {
        $users = User::paginate(1);
        return view('dashboardtext', ['users' => $users]);
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('show', ['user' => $user]);
    }


    // show brand


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'avatar' => 'required',
            'password' => 'required|min:6',
            'numberPhone' => 'required|min:10',


        ]);

        $data = $request->all();
        $check = $this->create($data, $request);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data, Request $request)
    {

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('/resources/image', $filename);
        } else {
            $filename = null;
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $data['avatar'],
            'numberPhone' => $data['numberPhone'],
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('');
    }
}
