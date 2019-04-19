<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Input;
use html;
use Auth;

class ManagerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function AddManager()
    {
        return view('admin.add-manager');
    }
    
    protected function create_manager(Request $request)
    {
            $rules = array(
                
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
    
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                
        $User = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            ]);
            $User->save();
            $role_user = DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$User->id, 3]);
    
           return redirect('All-members')->with('status','A new member has been added');
    
        }
    }
 
}
