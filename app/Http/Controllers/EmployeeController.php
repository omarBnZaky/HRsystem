<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\User;
use \App\Employee;
use \App\Role;
use \App\attnedence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Input;
use html;
use Auth;
use Carbon\Carbon;

class EmployeeController extends Controller
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

    
    public function AllEmployees()
    {
        
        $AllEmployees = Employee::all();
     
        return view('admin.all-employess',compact('AllEmployees','SpecialEmployees'));
    }
   
    public function AddEmployee()
    {
        return view('admin.add-employee');
    }
    protected function create_employee(Request $request)
    {
            $rules = array(
                
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'job_title' =>'required|string|max:255',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i|after:from',
            'salary'=> 'required|integer',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator);
            } else {
                
        $Employee = new Employee([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'job_title'=>$request->input('job_title'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'salary' => $request->input('salary'),
            ]);
            $Employee->user_id= Auth::user()->id;

            $Employee->save();

            if(($request->input('saturday'))){
                $holiday = $request->input('saturday');
                $saturday = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$Employee->id, $holiday]);
            }
            
            if(($request->input('sunday'))){
                $holiday = $request->input('sunday');
                $sunday = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$Employee->id, $holiday]);
            }
    
            if(($request->input('monday'))){
                $holiday = $request->input('monday');
                $monday = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$Employee->id, $holiday]);
            }

            if(($request->input('tuesday'))){
                $holiday = $request->input('tuesday');
                $tuesday = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$Employee->id, $holiday]);
            }

            if(($request->input('wednesday'))){
                $holiday = $request->input('wednesday');
                $wednesday = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$Employee->id, $holiday]);
            }
            
            if(($request->input('thursday'))){
                $holiday = $request->input('thursday');
                $thursday = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$Employee->id, $holiday]);
            }
            
            if(($request->input('friday'))){
                $holiday = $request->input('friday');
                $friday = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$Employee->id, $holiday]);
            }
        
           $Employee->off_days = count($Employee->holidays);
           $Employee->save();

           return redirect('All-employees')->with('status','A new member has been added');
      }
    }

    public function edit_employee_page($id){
        $Employee = Employee::find($id);

       return view('admin.edit-employees',compact('Employee'));
    }
    
    public function edit_employee(Request  $request,$id){      
        $employee = Employee::find($id);
        $saturday = $request->input('saturday');
        $sunday = $request->input('sunday');
        $monday = $request->input('monday');
        $tuesday = $request->input('tuesday');
        $wednesday = $request->input('wednesday');
        $thursday = $request->input('thursday');
        $friday = $request->input('friday');

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
                        $employee->name = $request->input('name');
                        $employee->email = $request->input('email');
                        $employee->password = Hash::make($request->input('password'));
         
                        if($saturday){
                            $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$saturday])->get();
                                if(count($saturdayExsist)  >0) {
                                    $employee->save();
                                } else{       
                                    $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $saturday]);
                                    $employee->save();
                                }
                        }elseif($sunday){
                            $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$sunday])->get();
                            if(count($Exsist)  >0) {
                                $employee->save();
                            } else{       
                                $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $sunday]);
                                $employee->save();
                            }
                        }elseif($monday){
                            $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$monday])->get();
                            if(count($Exsist)  >0) {
                                $employee->save();
                            } else{       
                                $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $monday]);
                                $employee->save();
                            }
                        }elseif($tuesday){
                            $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$tuesday])->get();
                            if(count($Exsist)  >0) {
                                $employee->save();
                            } else{       
                                $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $tuesday]);
                                $employee->save();
                             }
                         }elseif($wednesday){
                            $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$wednesday])->get();
                            if(count($Exsist)  >0) {
                                $employee->save();
                            } else{       
                                $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $wednesday]);
                                $employee->save();
                             }
                         }elseif($thursday){
                            $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$thursday])->get();
                            if(count($Exsist)  >0) {
                                $employee->save();
                            } else{       
                                $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $thursday]);
                                $employee->save();
                             }
                         }elseif($friday){
                            $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$friday])->get();
                            if(count($Exsist)  >0) {
                                $employee->save();
                            } else{       
                                $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $friday]);
                                $employee->save();
                             }
                         }
                        return redirect('All-employees')->with('msg','user have been updated');
                   }else{
                       
                }
              }   
              return 0;
          }else{

            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
                if($saturday){
                    $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$saturday])->get();
                        if(count($Exsist)  >0) {
                            $employee->save();
                        } else{       
                            $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $saturday]);
                            $employee->save();
                        }
                }elseif($sunday){
                    $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$sunday])->get();
                    if(count($Exsist)  >0) {
                        $employee->save();
                    } else{       
                        $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $sunday]);
                        $employee->save();
                    }
                }elseif($monday){
                    $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$monday])->get();
                    if(count($Exsist)  >0) {
                        $employee->save();
                    } else{       
                        $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $monday]);
                        $employee->save();
                    }
                }elseif($tuesday){
                    $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$tuesday])->get();
                    if(count($Exsist)  >0) {
                        $employee->save();
                    } else{       
                        $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $tuesday]);
                        $employee->save();
                     }
                 }elseif($wednesday){
                    $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$wednesday])->get();
                    if(count($Exsist)  >0) {
                        $employee->save();
                    } else{       
                        $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $wednesday]);
                        $employee->save();
                     }
                 }elseif($thursday){
                    $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$thursday])->get();
                    if(count($Exsist)  >0) {
                        $employee->save();
                    } else{       
                        $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $thursday]);
                        $employee->save();
                     }
                 }elseif($friday){
                    $Exsist = DB::table('holidays')->where(['employee_id'=>$employee->id,'holiday'=>$friday])->get();
                    if(count($Exsist)  >0) {
                        $employee->save();
                    } else{       
                        $Insert = DB::insert('insert into holidays (employee_id,holiday) values (?, ?)', [$employee->id, $friday]);
                        $employee->save();
                     }
                     return redirect('All-employees')->with('msg','user have been updated');

                 }
                 return redirect('All-employees')->with('msg','user have been updated');

          }
          return redirect('All-employees')->with('msg','user have been updated');

    }

    public function delete_employee_holiday($id,$holiday_id){
        $employee = Employee::find($id);
        $holiday = DB::table('holidays')
        ->where('employee_id','=',$employee->id)
        ->where('id','=',$holiday_id)
        ->delete();
        return back()->with('msg','employee holiday havs been deleted');

    }

    public function remove_employee($id){
            $Employee = Employee::find($id);
            $Employee->delete();
           return redirect('All-employees')->with('msg','user has been delelted successfully');
    }


    public function employee_attendence($id)
    {
                $employee = Employee::find($id);
                return view('admin.search-attendance',compact('employee'));
            
    
    }

    public function search_attendence(Request $request,$id)
    {
        $employee = Employee::find($id);
        $month = $request->input('month');
        $year = $request->input('year');

        
        $results =  DB::table('attnedences')
                           ->where('employee_id','=',$id)
                           ->whereMonth('day', '=', $month)
                           ->whereYear('day', '=', $year)
                           ->orderBy('day')
                           ->get();
  
     return view('admin.search-attendance',compact('employee','results'));
    }
    public function create_employee_attendence(Request $request,$id)
    {
        $employee = Employee::find($id);
        return view('admin.add-attendence',compact('employee'));

    }
    
    public function store_employee_attendence(Request $request,$id)
    {

        $employee = Employee::find($id);

        $this->validate($request,[
            'day' => 'required',
            'from'=> 'required',
            'to'=>'required',
        ]);
        $DefStartTime = Carbon::parse($employee->from);
        $DefFinishTime = Carbon::parse($employee->to);

        $StartTime = Carbon::parse($request->input('from'));
        $FinishTime = Carbon::parse($request->input('to'));

       $DeftotalDuration = $DefFinishTime->diffInHours($DefStartTime);
       $totalDuration = $FinishTime->diffInHours($StartTime);

   //    return  $DeftotalDuration."<br>From". $employee->from."<br>to".$employee->to."<br>";
  //     return  $totalDuration."<br>From". $request->input('from')."<br>to".$request->input('to')."<br>";
  // return  $totalDuration / $DeftotalDuration;
        $attendence = new  attnedence;
        $attendence->employee_id = $employee->id;
        $attendence->from = $request->input('from');
        $attendence->to = $request->input('to');
        $attendence->day = $request->input('day');
        $attendence->attendence_ratio =  $totalDuration / $DeftotalDuration;
        $attendence->save(); 
        return redirect()->back()->with('success', 'attendence added successfully');

    }
}