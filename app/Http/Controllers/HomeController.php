<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use App\Student;
use App\Event;
use App\College;
use App\EventRelations;
use Illuminate\Http\Request;

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
        $user = Auth::user();
        if($user->is_admin == 0){
            Auth::logout();
            return redirect("login")->with("error", "You must be verified to access the page.");
        }

        $user = Auth::user();
        $students = Student::orderBy('roll_number', 'asc')->where('accomp_id', $user->id)->get();
        $events = Event::all();

        $total_students = $students->count();
        $total_assigned = 0;
        foreach ($students as $student) {
            $assigns = EventRelations::where("student", $student->id)->count();
            if($assigns>0)
            $total_assigned += 1;
        }

        return view('home', [
            "events" => $events,
            "students" => $students,
            "total_students" => $total_students,
            "total_assigned" => $total_assigned
        ]);
    }
    public function approve_list(){
        $user_id = Auth::id();
        $user = User::find($user_id);
        if($user->is_admin !== 2){
            return redirect("home")->with("error", "Only super-admins can access that page.");
        }
        $users_data = User::where("is_admin", "0")->orWhere("is_admin", "1")->get();
        return view("dashboard.approve", ["users_data"=>$users_data]);
    }
    public function approve_user($id){
        $user_id = Auth::id();
        $user = User::find($user_id);
        if($user->is_admin !== 2){
            return redirect("home")->with("error", "Only super-admins can access that page.");
        }
        $user = User::find($id);
        $user->is_admin = 1;
        $user->save();
        return redirect("home/approve_list")->with("success", "User has been approved for adding data.");
    }
    public function destroy_user($id){
        $user_id = Auth::id();
        $user = User::find($user_id);
        if($user->is_admin !== 2){
            return redirect("home")->with("error", "Only super-admins can access that page.");
        }
        $user = User::find($id);
        $user->delete();
        return redirect("home/approve_list")->with("success", "User request has been deleted.");
    }
    public function change_password(){
        return view("auth.change_password");
    }
    public function change_password_update(Request $request){
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:8'
        ]);

        $current_password = $request->input("old_password");
        $new_password = $request->input("password");

        $password = Auth::user()->password;
        $user_id = Auth::id();
        if(Hash::check($current_password, $password)){
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($new_password);
            $obj_user->save(); 
            return redirect("home/change_password")->with("success","Password has been changed");
        }else{
            return redirect("home/change_password")->with("error","Current password is incorrect");
        };
    }
    public function generate(){
        return "";
        $colleges = College::all();
        foreach($colleges as $college){
            $user = new User;
            $user->name = $college->name;
            $user->email = null;
            $user->is_admin = 1;
            $user->username = $college->registration_number;
            $user->password = Hash::make($college->registration_number . "123");
            $user->college_id = $college->id;
            $user->save();
        }
    }
}
