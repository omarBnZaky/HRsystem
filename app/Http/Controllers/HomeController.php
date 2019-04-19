<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Role;
use \App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Input;
use html;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $usersCount = count($users);

        $AllusersExpectAdmin = User::where('id','>','1')->get();
        $AllusersExpectAdminCount =count($AllusersExpectAdmin);
        

        return view('home',compact('users','usersCount','MainUserRoles','AllusersExpectAdmin','AllusersExpectAdminCount'));
    }
    
    public function Allmembers()
    { 
        $AllUsers = User::all();
        $AllusersExpectAdmin = User::where('id','>','1')->get();


        return view('admin.All-members',compact('AllUsers','AllusersExpectAdmin','AllusersforManager'));
    }
    public function AddMember()
    {
        $Roles = Role::all();
        return view('admin.add-member',compact('Roles'));
    }
    
  
    
    protected function create_member(Request $request)
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
        $role = $request->input('role_id');
        $role_user = DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$User->id, $role]);

            return redirect('All-members')->with('status','A new member has been added');

     }
    }
     public function delete($id){
         $user = User::find($id);
         $user->delete();
        return redirect('All-members')->with('msg','user has been delelted successfully');
     }
     public function edit_member_page($id){
        $user = User::find($id);
        $Roles = Role::all();

       return view('admin.edit-member',compact('user','Roles'));
    }
 
    
     public function edit_member(Request  $request,$id){      
        $user = User::find($id);
      if(($request->input('oldPassword'))){
        $rules = array(
            
            'password'       => 'required',
            'oldPassword'      => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else{
            
        
       if(\Hash::check($request->input('oldPassword'), $user->password)) {

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $role = $request->input('role_id');
        $exist = DB::table('role_user')->where(['user_id'=>$user->id,'role_id'=>$role])->get();
        if(count($exist)  >0) {
            $user->save();

        } else  {       
             $role_user = DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$user->id, $role]);
             $user->save();
        }
        return redirect('All-members')->with('msg','user have been updated');
       }else{
        return back()->with('msg','uncorrect password');
      }
    }   
    }else{
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $role = $request->input('role_id');
        $exist = DB::table('role_user')->where(['user_id'=>$user->id,'role_id'=>$role])->get();
        if(count($exist)  >0) {
            $user->save();

        } else  {       
            $role_user = DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [$user->id, $role]);
            $user->save();
        }
        return redirect('All-members')->with('msg','user have been updated');
        } 
    }

    public function delete_user_role($id,$role_id){
        $user = User::find($id);
        $Role = Role::find($role_id);
        $Role_id = DB::table('role_user')
        ->where('user_id','=',$user->id)
        ->where('role_id','=',$role_id)
        ->delete();
        return back()->with('msg','user role havs been deleted');

    }



    /*

    public function roles(){
        $Roles = Role::all();
        return view('admin.all-roles',compact('Roles'));
    }



    public function create_role(){
      
        return view('admin.create-role',compact('user','Roles'));
    }

    


    public function store_role(){
        $role = new Role;
        $role->name = $request->input('name');
        $role->save();
        return redirect()->route('allroles')->with('msg','new role added succesfully');
    }



    public function edit_role(){
      
        return view('admin.edit-role',compact('user','Roles'));
    }



    public function update_role(){
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        return redirect()->route('allroles')->with('msg',' role updated succesfully');
    }*/



}
