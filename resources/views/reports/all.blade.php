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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Event wise Report for IKG PTU Youthfest</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable( {
            "paging":   false,
            
        });
    });
</script>
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
<table id="myTable">
    <thead>
        <tr>
            <th >SNo</th>
            <th >Name</th>
            <th >Father Name</th>
            <th >University Registration</th>
            <th>Roll No.</th>
            <th>Class</th>
            <th >Role</th>
            <th >College</th>
            <th>Events</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
        @foreach (Student::all() as $student)
            <?php
                $i++;
                $user = User::where("id", $student->accomp_id)->first();
                $event_string = "";
                ;
                foreach (EventRelations::where("student", $student->id)->get() as $er) {
                    $event_string .= Event::find($er->event)->name . ", ";
                }
                $event_string = rtrim($event_string, ", ");
            ?>
            <tr>
            <td>{{$i}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->father_name}}</td>
            <td>{{$student->university_registration}}</td>
            <td>{{$student->roll_number}}</td>
            <td>{{$student->class}} {{$student->branch}}</td>
            <td>{{$student->participating_as}}</td>
            <td>{{$user->name}}</td>
            <td>{{$event_string}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>

</body>
</html>