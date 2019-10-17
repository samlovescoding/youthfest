<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Student;
use App\EventRelations;
use App\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view("events.index", ["events" => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("events.create");
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
            'description' => 'required',
            'length' => 'required',
            'max_participants' => 'required',
            'max_accomp' => 'required',
            'organised_by' => 'required'
        ]);

        $event = new Event;
        $event->name                        = $request->input("name");
        $event->description                 = $request->input("description");
        $event->time_length                 = $request->input("length");
        $event->max_participants            = $request->input("max_participants");
        $event->max_accomp                  = $request->input("max_accomp");
        $event->organised_by                = $request->input("organised_by");

        
            //return redirect("/students")->with("error", "Student Photo must be uploaded for registration.");
        

        $event->save();
        return redirect("/events")->with("success", "Event has been added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * VIEW Assign a user to the event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign($id)
    {
        $event = Event::find($id);
        $user_id = Auth::id();
        $students = Student::orderBy('roll_number', 'asc')->where('accomp_id', $user_id)->get();

        $total_participant_assigned = 0;
        $total_accomp_assigned = 0;
        $student_list = [];
        foreach ($students as $student) {
            if(EventRelations::where("event", $id)->where("student", $student->id)->count() == 1){
                $student_list[] = $student;
                if($student->participating_as == "participant")
                    $total_participant_assigned ++;
                else
                    $total_accomp_assigned ++;
            }
        }

        
        
        return view("events.assign",[
            "event" => $event,
            "students" => $student_list,
            "total_participants_assigned" => $total_participant_assigned,
            "total_accomp_assigned" => $total_accomp_assigned
        ]);
        
    }
    /**
     * HANDLE Assign a user to the event.
     *
     * @param  int  $event_id
     * @param  int  $student_id
     * @return \Illuminate\Http\Response
     */
    public function assign_create($event_id, $student_id)
    {
        $event_relation = new EventRelations;
        $event_relation->event = $event_id;
        $event_relation->student = $student_id;
        $event_relation->save();
        return redirect("/events/$event_id/assign");
    }
    /**
     * HANDLE De-assign a user to the event.
     *
     * @param  int  $event_id
     * @param  int  $student_id
     * @return \Illuminate\Http\Response
     */
    public function deassign($event_id, $student_id)
    {
        $event_relation = EventRelations::where("event", $event_id)->where("student", $student_id);
        $event_relation->delete();
        return redirect("/events/$event_id/assign");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view("events.edit", ["event"=>$event]);
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
            'description' => 'required',
            'length' => 'required',
            'max_participants' => 'required',
            'max_accomp' => 'required',
            'organised_by' => 'required'
        ]);

        $event = Event::find($id);
        $event->name                        = $request->input("name");
        $event->description                 = $request->input("description");
        $event->time_length                 = $request->input("length");
        $event->max_participants            = $request->input("max_participants");
        $event->max_accomp                  = $request->input("max_accomp");
        $event->organised_by                = $request->input("organised_by");

        
            //return redirect("/students")->with("error", "Student Photo must be uploaded for registration.");
        

        $event->save();
        return redirect("/events")->with("success", "Event has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect("/events")->with("success", "Event was deleted.");
    }
}
