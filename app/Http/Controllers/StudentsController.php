<?php

namespace App\Http\Controllers;
use DateTime;

use Auth;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Event;
use App\EventRelations;

class StudentsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $students = Student::orderBy('roll_number', 'asc')->where('accomp_id', $user_id)->paginate();
        return view("students.index")->with("students", $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        $event_list = [];
        foreach ($events as $event) {
            $event_list[$event->id] = $event->name ;
        }
        return view("students.create", ["event_list"=>$event_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'father_name' => 'required',
        //     'date_birth' => 'required',
        //     'participating_as' => 'required',
        //     'class' => 'required',
        //     'branch' => 'required',
        //     'roll_number' => 'required',
        //     'year_of_passing' => 'required',
        //     'address' => 'required',
        //     'event_list' => 'required',
        //     'student_photo' => 'image|nullable|max:1999'
        // ]);

        $student = new Student;
        $student->name                      = $request->input("name");
        $student->father_name               = $request->input("father_name");
        $student->date_birth                = $request->input("date_birth");
        $student->participating_as          = $request->input("participating_as");
        $student->class                     = $request->input("class");
        $student->branch                    = $request->input("branch");
        $student->roll_number               = $request->input("roll_number");
        $student->university_registration   = $request->input("university_registration");
        $student->year_of_passing           = $request->input("year_of_passing");
        $student->address                   = $request->input("address");
        $student->accomp_id                 = Auth::id();
        
        $event_list                         = $request->input("event_list");

        $date_birth = DateTime::createFromFormat("Y-m-d", $student->date_birth);
        $date_now = new DateTime;

        $date_interval = $date_now->diff($date_birth);

        if($date_interval->y >= 25){
            return redirect("/students")->with("error", "Student must be younger than 25 year.");
        }

        //Handle File Upload
        if($request->hasFile("student_photo")){
            $extension = $request->file("student_photo")->getClientOriginalExtension();
            $filename = md5(rand(10000,99999) . time()) . "." . $extension;
            $request->file("student_photo")->storeAs('public/studentPhotos', $filename);
            $student->student_photo = $filename;
        }else{
            return redirect("/students")->with("error", "Student Photo must be uploaded for registration.");
        }

        if($student->university_registration == null){
            $student->university_registration = "0";
        }

        $student->save();

        $student_id = $student->id;
        foreach ($event_list as $index => $event_id) {
            $event_relation = new EventRelations;
            $event_relation->student = $student_id;
            $event_relation->event = $event_id;
            $event_relation->save();
        }

        return redirect("/students")->with("success", "Student Registered.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        if(Auth::id() !== $student->accomp_id){
            return redirect("/posts")->with("error", "Unauthorized Page");
        }
        return view("students.show")->with("student", $student);
    }

    public function print($id)
    {
        $student = Student::find($id);
        if(Auth::id() !== $student->accomp_id){
            return redirect("/posts")->with("error", "Unauthorized Page");
        }
        return view("students.print")->with("student", $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        if(Auth::id() !== $student->accomp_id){
            return redirect("/posts")->with("error", "Unauthorized Page");
        }
        return view("students.edit")->with("student", $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'father_name' => 'required',
            'date_birth' => 'required',
            'participating_as' => 'required',
            'class' => 'required',
            'branch' => 'required',
            'roll_number' => 'required',
            'university_registration' => 'required',
            'year_of_passing' => 'required',
            'address' => 'required',
            'student_photo' => "image|nullable|max:1999"
        ]);

        $student = Student::find($id);

        if(Auth::id() !== $student->accomp_id){
            return redirect("/posts")->with("error", "Unauthorized Page");
        }

        $student->name                      = $request->input("name");
        $student->father_name               = $request->input("father_name");
        $student->date_birth                = $request->input("date_birth");
        $student->participating_as          = $request->input("participating_as");
        $student->class                     = $request->input("class");
        $student->branch                    = $request->input("branch");
        $student->roll_number               = $request->input("roll_number");
        $student->university_registration   = $request->input("university_registration");
        $student->year_of_passing           = $request->input("year_of_passing");
        $student->address                   = $request->input("address");
        $student->accomp_id                 = Auth::id();

        //Handle File Upload
        if($request->hasFile("student_photo")){
            $extension = $request->file("student_photo")->getClientOriginalExtension();
            $filename = md5(rand(10000,99999) . time()) . "." . $extension;
            $request->file("student_photo")->storeAs('public/studentPhotos', $filename);
            $student->student_photo = $filename;
        }

        

        $student->save();
        return redirect("/students")->with("success", "Student information has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if(Auth::id() !== $student->accomp_id){
            return redirect("/posts")->with("error", "Unauthorized Page");
        }
        unlink("storage/studentPhotos/" . $student->student_photo);
        $student->delete();
        return redirect("/students")->with("success", "Student has been deleted.");
    }
}
