<?php

namespace App\Http\Controllers;

use App\Models\PatientDoctor;
use App\Models\Patients;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.register");
    }

    public function registerScript(Request $request){
        $request->validate([
            'name'=>'required',
            'gender',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:15',
            'contact'=>'required|min:10|max:10|unique:users',
            'role'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = ($request->password);
        $user->contact = $request->contact;
        $user->role = $request->role;
        $res = $user->save();

        if($res){
            return back()->with('success','registered succesfully');
        }else{
            return back()->with('fail','unable to register');
        }

    }

    public function loginScript(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15',
        ]);

        $user = User::where('email','=',$request->email)->first();

        if($user){
            if(($request->password == $user->password)){
                if($user->role == 'employee'){
                    $request -> session()->put('loginId', $user->id);
                    return redirect('dashboard');
                }else{
                    $request -> session()->put('loginId', $user->id);
                    return redirect('mo_dashboard');
                }
                // return back()->with('success','logged in succesfully');
            }else{
                return back()->with('fail','Wrong password');
            }
        }else{
            return back()->with('fail','unable to login');
        }
    }
    
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('employee_dashboard', compact('data'));
    }

    public function mo_dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('auth.register', compact('data'));
    }

    public function updateDoctors($id)
    {   
        $fetch = User::where('id','=',$id)->first();
        // return view('mo.viewDoctors', ['doctors'=>$fetch]);
        if($fetch){
            return view('mo.update_doctors', ['doctor'=>$fetch]);
        }
    }

    public function adminUpdateScript(Request $request)
    {
            $user = User::where('id','=',$request->id)->first();


            $request->validate([
                'name'=>'required',
                'gender',
                'email' => ["required", Rule::unique('users')->ignore($user)],
                // 'password'=>'required|min:5|max:15',
                'contact'=>['required','min:10','max:10', Rule::unique('users')->ignore($user)],
                // 'role'
                'highest_qualification',
                'institution',
                'year',
                'specialization'
            ]);
        // }
            
            $user->name = $request->name;
            $user->gender = $request->gender;
                $user->email = $request->email;
                $user->contact = $request->contact;
            $user->highest_qualification = $request->highest_qualification;
            $user->institution = $request->institution;
            $user->year = $request->year;
            $user->specialization = $request->specialization;
            $user->update();

            if($user){
                return redirect('doctor_view')->with('success','updated succesfully');
            }else{
                return back()->with('fail','unable to update');
            }

    }

    public function updateScript(Request $request){
        if(Session::has('loginId')){
            $user = User::where('id','=',Session::get('loginId'))->first();

            
        $request->validate([
            'name'=>'required',
            'gender',
            'email' => ["required", Rule::unique('users')->ignore($user)],
            'password'=>'required|min:5|max:15',
            'contact'=>['required','min:10','max:10', Rule::unique('users')->ignore($user)],
            'role',
            'highest_qualification',
            'institution',
            'year',
            'specialization'
        ]);
    // }
        
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = $request->password;
        $user->highest_qualification = $request->highest_qualification;
        $user->institution = $request->institution;
        $user->year = $request->year;
        $user->specialization = $request->specialization;
        $user->update();

        if($user){
            return redirect('dashboard')->with('success','updated succesfully');
        }else{
            return back()->with('fail','unable to update');
        }

        }
    }

    public function doctor_view(){
        $data = User::where('role', '=', 'employee')->get();
        return view('mo.viewDoctors', ['doctors'=>$data]);
    }
    public function delete($id)
    {
        $delete = DB::table('users')
                    ->where('id', $id)
                    ->delete();
        if($delete){
            return back()->with('success', 'deleted');
        }else{
            return back()->with('fail', 'failed to delete');
        }
    }

    public function patientRegistration($id)
    {
        $fetch = User::where('id','=',$id)->first();
            if($fetch){

                return view("common.patient_registration", ['doctor' =>  $fetch]);
            }else{

                return back()->with('fail','Failed');
            }

    }

    public function patientRegisterScript(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'gender',
            'DOB'=>'required',
            'contact'=>'required|min:10|max:10|unique:patients',
            'address'=>'required|min:5|max:40',
            'ailment',
        ]);
        $patient = new Patients();
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->DOB = $request->DOB;
        $patient->contact = $request->contact;
        $patient->address = $request->address;
        $patient->ailment = $request->ailment;
        $res = $patient->save();

        if($res){
            return back()->with('success','registered succesfully');
        }else{
            return back()->with('fail','unable to register');
        }
    }

    public function assignPatient(Request $request, $id)
    {
        $fetch = User::where('id','=',$id)->first();
        // $data = Patients::where('ailment', '=', $fetch->specialization)->get();
        $getId = Patients::where('ailment', '=', $fetch->specialization)->get();

        $data = DB::table('patients')
        ->leftJoin('patient_doctor', 'patient_doctor.pid', '=', 'patients.id')
        ->where('patients.ailment', $fetch->specialization)
        // ->where('patient_doctor.pid', '!=', $getId->id)  
        ->whereNull('patient_doctor.pid')
        ->select('patients.*')
        ->get();
            
        if($fetch){

            return view("mo.assign_patients", ['doctor' =>  $fetch], ['patients'=> $data]);
        }else{

            return back()->with('fail','Failed');
        }
    }
    public function assignPatientScript(Request $request)
    {
        $assign = new PatientDoctor();
        $assign->did = $request->did;
        $assign->pid = $request->pid;
        $res = $assign->save();

        if($res){
            return back()->with('success','assigned succesfully');
        }else{
            return back()->with('fail','unable to assign');
        }
    }
    public function viewPatients(Request $request, $id)
    {   
        $fetch = User::where('id','=',$id)->first();

        $data = DB::table('patients')
        ->leftJoin('patient_doctor', 'patient_doctor.pid', '=', 'patients.id')
        ->where('patients.ailment', $fetch->specialization)
        // ->where('patient_doctor.pid', '!=', $getId->id)  
        // ->whereNull('patient_doctor.pid')
        ->select('patients.*')
        ->get();

        if($fetch){

            return view("view_patients", ['doctor' =>  $fetch], ['patients'=> $data]);
        }else{

            return back()->with('fail','Failed');
        }
    }
}
