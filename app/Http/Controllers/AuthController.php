<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserValidationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function login()
    {
      if(session()->has('user'))
      {
        return to_route('dashboard');
      }
      return view('login');
    }

  
    public function loginAuth(Request $req)
    {
      if(Auth::attempt(['email' => $req->email, 'password' => $req->password, 'active' => 1]))
      {
        $user = Auth::user();
        $user->last_activity = Carbon::now();
        $user->save();
        
        $req->session()->put('user', $req->input('email'));
        return redirect()->intended('/dashboard');
      }
      if(Auth::attempt(['email' => $req->email, 'password' => $req->password, 'active' => 0]))
      {
        return back()
        ->withErrors([
          'invalid' => 'Account Inactive. Please contact customer support.'
          ])
        ->withInput();
      }
      else {
        return back()
          ->withErrors([
            'invalid' => 'Invalid Credentials. Please try again'
            ])
          ->withInput();
      }
    }
    
    
    public function logout()
    {
      if(session()->has('user'))
      {
        session()->pull('user');
      }
      return redirect()->route('login.form');
    }
    
    
    public function dashboard()
    {
      $users = User::all();
      return view('dashboard', compact('users'));
    }
    
    
    public function switchAccount(Request $req)
    {
      if(Auth::user()->isAdmin())
      {
        $user = User::findOrFail($req->input('userId'));
        Auth::login($user);
        return redirect()->intended('/dashboard');
      }
      abort(403, 'UNAUTHORIZED ACTION');
    }


  public function register(Request $req)
  {
    $validator = Validator::make($req->all(), (new UserValidationRequest)->rules());
    
    if($validator->fails())
    {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }
    
    User::create([
      'name' => $req->input('name'),
      'email' => $req->input('email'),
      'password' => Hash::make($req->input('password')),
      'role' => $req->input('role'),
      ]);
      
    $req->session()->flash('success', 'User added successfully');
    
    return redirect()->back();
  }
}
