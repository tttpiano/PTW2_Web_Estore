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
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'avatar' => 'required', // Add validation for image file
            'password' => 'required|min:6',
            'numberPhone' => 'required|min:10',
            'type' => 'required|in:user,admin',
        ]);

        $fileName = null;

        if ($request->hasFile('avatar')) {
            $originName = $request->file('avatar')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileName = $fileName . '.' . $extension;
            // Public Folder
            $request->file('avatar')->move(public_path('storage/img/'), $fileName);
            $request->session()->put('fileName1', $fileName);
        }

        $type = $request->input('type', 'user');
        $data = $request->all();
         $this->create($data, $request,$type);

        return back()->with('success', 'User add successfully')
            ->with('images', $fileName);
    }

    public function create(array $data, Request $request, $type)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' =>  $request->session()->get('fileName1'),
            'numberPhone' => $data['numberPhone'],
            'type' => $type,
        ]);
    }
}
