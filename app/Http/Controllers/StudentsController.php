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
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $sort_by = "name";
        if($request->has("sort_by")){
            $sort_by = $request->input("sort_by");
        }
        $students = Student::orderBy($sort_by, 'asc')->where('accomp_id', $user_id)->paginate();
        return view("students.index")->with("students", $students);
    }
    public function index_unassigned(Request $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $sort_by = "name";
        if($request->has("sort_by")){
            $sort_by = $request->input("sort_by");
        }
        $students = Student::orderBy($sort_by, 'asc')->where('accomp_id', $user_id)->get();
        return view("students.index")->with("students", $students)->with("unassigned", true);
    }
    public function all(Request $request)
    {
        $sort_by = "name";
        if($request->has("sort_by")){
            $sort_by = $request->input("sort_by");
        }
        $students = Student::orderBy($sort_by, 'asc')->paginate();
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
            $n = 0;
            $students = Student::where("accomp_id", Auth::id())->get();
            foreach ($students as $student) {
                $n += EventRelations::where("student", $student->id)->where("event", $event->id)->count();
            }
            $event->assigned = $n;
            $event_list[] = $event;
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
        $this->validate($request, [
            'name' => 'required',
            'father_name' => 'required',
            'date_birth' => 'required',
            'participating_as' => 'required',
            //'class' => 'required',
            //'branch' => 'required',
            //'roll_number' => 'required',
            //'year_of_passing' => 'required',
            'address' => 'required',
            'event_list' => 'required',
            'student_photo' => 'image|nullable|max:1999'
        ]);

        $student = new Student;
        $student->name                      = $request->input("name");
        $student->father_name               = $request->input("father_name");
        $student->date_birth                = $request->input("date_birth"); //Datetime::createFromFormat("d/m/Y")->format("Y-m-d");
        $student->participating_as          = $request->input("participating_as");
        $student->class                     = $request->input("class") ? $request->input("class") : "";
        $student->branch                    = $request->input("branch") ? $request->input("branch") : "";
        $student->roll_number               = $request->input("roll_number") ? $request->input("roll_number") : "" ;
        $student->university_registration   = $request->input("university_registration") ? $request->input("university_registration") : "";
        $student->year_of_passing           = $request->input("year_of_passing") ? $request->input("year_of_passing") : "";
        $student->address                   = $request->input("address");
        $student->accomp_id                 = Auth::id();
        
        $event_list                         = $request->input("event_list");

        $date_birth = DateTime::createFromFormat("Y-m-d", $student->date_birth);
        $date_now = new DateTime;

        $date_interval = $date_now->diff($date_birth);

        if($student->participating_as == "participant" && $date_interval->y >= 25){
            return redirect("/students")->with("error", "Participant must be younger than 25 year.");
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

        //print_r($event_list);
        //return "";
        foreach ($event_list as $event_id => $value) {
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
        $user_id = Auth::id();
        if($user_id !== 1)
        if($user_id !== $student->accomp_id){
            return redirect("/home")->with("error", "Unauthorized Page");
        }
        return view("students.show")->with("student", $student)->with("user_id", $user_id);
    }

    public function print($id)
    {
        $student = Student::find($id);
        $user_id = Auth::id();
        if($user_id !== 1)
        if($user_id !== $student->accomp_id){
            return redirect("/home")->with("error", "Unauthorized Page");
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
        $student_in_context = Student::find($id);
        $user_id = Auth::id();
        if($user_id !== 1)
        if($user_id !== $student_in_context->accomp_id){
            return redirect("/home")->with("error", "Unauthorized Page");
        }

        $event_relations = EventRelations::where("student", $id)->get();
        
        $events = Event::all();
        $event_list = [];
        foreach ($events as $event) {
            $n = 0;
            $students = Student::where("accomp_id", Auth::id())->get();
            foreach ($students as $student) {
                $n += EventRelations::where("student", $student->id)->where("event", $event->id)->count();
            }
            $event->assigned = $n;
            $event_list[] = $event;
        }

        return view("students.edit")->with("student", $student_in_context)->with("event_relations", $event_relations)->with("event_list", $event_list);
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
            //'class' => 'required',
            //'branch' => 'required',
            //'roll_number' => 'required',
            //'university_registration' => 'required',
            'year_of_passing' => 'required',
            'address' => 'required',
            'student_photo' => "image|nullable|max:1999"
        ]);

        $student = Student::find($id);

        $user_id = Auth::id();
        if($user_id !== 1)
        if($user_id !== $student->accomp_id){
            return redirect("/home")->with("error", "Unauthorized Page");
        }

        $student->name                      = $request->input("name");
        $student->father_name               = $request->input("father_name");
        $student->date_birth                = $request->input("date_birth");
        $student->participating_as          = $request->input("participating_as");
        $student->class                     = $request->input("class") ? $request->input("class") : "";
        $student->branch                    = $request->input("branch") ? $request->input("branch") : "";
        $student->roll_number               = $request->input("roll_number") ? $request->input("roll_number") : "" ;
        $student->university_registration   = $request->input("university_registration") ? $request->input("university_registration") : "";
        $student->year_of_passing           = $request->input("year_of_passing") ? $request->input("year_of_passing") : "";
        $student->address                   = $request->input("address");
        $student->accomp_id                 = Auth::id();
        $event_list                         = $request->input("event_list");

        //Handle File Upload
        if($request->hasFile("student_photo")){
            $extension = $request->file("student_photo")->getClientOriginalExtension();
            $filename = md5(rand(10000,99999) . time()) . "." . $extension;
            $request->file("student_photo")->storeAs('public/studentPhotos', $filename);
            $student->student_photo = $filename;
        }

        $event_relations = EventRelations::where("student", $id)->get();
        foreach ($event_relations as $event_relation) {
            $eventRelation = EventRelations::find($event_relation->id);
            $eventRelation->delete();
        }
        if($event_list == null) $event_list = [];
        foreach ($event_list as $event_id => $value) {
            $event_relation = new EventRelations;
            $event_relation->student = $id;
            $event_relation->event = $event_id;
            $event_relation->save();
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
        if($student !== null){
            $user_id = Auth::id();
            if($user_id !== 1)
            if($user_id !== $student->accomp_id){
                return redirect("/home")->with("error", "Unauthorized Page");
            }
            unlink("storage/studentPhotos/" . $student->student_photo);
            $student->delete();
        }
        return redirect("/students")->with("success", "Student has been deleted.");
        $event_relations = EventRelations::where("student", $id);
        foreach ($event_relations as $event_relation) {
            $event_relation->delete();
        }
    }

    public function idcards(){
        $students = Student::all();
        return view("students.idcard", array(
            "students" => $students
        ));
    }
    public function print_idcard($id){
        $student = Student::find($id);
        return view("students.mycard", array(
            "student" => $student
        ));
    }
    public function lock_idcards(){
        $students = Student::all();
        foreach ($students as $student) {
            $student->printed = 1;
            $student->save();
        }
        return redirect("/students/all");
    }

    public function college($college_name)
    {
        $user = User::where("username", $college_name)->first();
        if($user == null) return redirect("/home")->with("error", "College not found.");
        $user_id = $user->id;
        $students = Student::orderBy("name", 'asc')->where('accomp_id', $user_id)->paginate();
        return view("students.index")->with("students", $students);
    }

    public function college_id_cards($college_name){
        $user = User::where("username", $college_name)->first();
        if($user == null) return redirect("/home")->with("error", "College not found.");
        $user_id = $user->id;
        $students = Student::where("accomp_id", $user_id)->get();
        return view("students.idcard", array(
            "students" => $students
        ));
    }
    public function lock_college_id_cards($college_name){
        $user = User::where("username", $college_name)->first();
        if($user == null) return redirect("/home")->with("error", "College not found.");
        $user_id = $user->id;
        $students = Student::where("accomp_id", $user_id)->get();
        foreach ($students as $student) {
            $student->printed = 1;
            $student->save();
        }
        return redirect("/colleges");
    }
}
