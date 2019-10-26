<?php
    use App\Event;
    use App\Student;
    use App\User;
    use App\College;
    use App\EventRelations;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Domine&display=swap" rel="stylesheet">
    <title>Event wise Report for IKG PTU Youthfest</title>
</head>
<body>
<style>
    body{
        font-family: 'Domine', serif;font-family: 'Domine', serif;

    }
    table{
        border-collapse: collapse;
        width:100%;
    }
    td, th {
        border:1px solid black;
    }
</style>
    @foreach (Event::all() as $event)
        <h2>{{$event->name}}</h2>
        @foreach (College::all() as $college)
        
            @php
                $user = User::where("username", $college->registration_number)->first();
                $my_students = Student::where("accomp_id", $user->id)->get();
                $students = [];
                foreach ($my_students as $student) {
                    $event_relations = EventRelations::where("student", $student->id)->where("event", $event->id)->count();
                    if($event_relations > 0){
                        $students[] = $student;
                    }
                }
            @endphp
            @if (count($students) !== 0)
                <h3>{{$college->name}}</h3>
                <table>
                    <thead>
                        <tr>
                            <th width="30%">Name</th>
                            <th width="20%">University Registration</th>
                            <th width="20%">Roll No.</th>
                            <th width="10%">Class</th>
                            <th width="10%">Role</th>
                            <th width="10%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->university_registration}}</td>
                            <td>{{$student->roll_number}}</td>
                            <td>{{$student->class}}</td>
                            <td>{{$student->participating_as}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endforeach
        <p style="page-break-before: always"></p>
    @endforeach


</body>
</html>