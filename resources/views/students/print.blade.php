<?php
  use App\Event;
  use App\User;
  use App\College;
  use App\EventRelations;

  $accomp = User::find($student->accomp_id);
  $college_id = $accomp->college_id;
  $college = College::find($college_id);

  $event_relations = EventRelations::where("student", $student->id)->get();
  $event_string = "";
  $total_events = 0;
  foreach ($event_relations as $event_relation) {
    $event = Event::find($event_relation->event);
    $event_string .= $event->name . ", ";
    $total_events++;
  }
  $event_string = rtrim($event_string, ", ");

  $college_name_data = explode(",", $college->name);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IKGPTU Printable Form</title>
    <style>
    body, pre{
        font-family: "Arial";
    }
    .header h2{
        margin-bottom:10px;
        font-size:20px;
    }
    .header h4{
            margin-top:5px;
            font-size:14px;
            margin-bottom:5px;
    }
    ol li{
        line-height:30px;
    }
    </style>
</head>
<body>
    <h5 style="float:right; margin-right:50px; font-family:'Times New Roman';">Performa-I</h5>
    <div class="attested" style="font-family:'Times New Roman'; border:1px solid black; display:inline-block;line-height:140px; padding:0px 10px;position: absolute;right:50px;top:50px; 
    background:url('/storage/studentPhotos/<?=$student->student_photo?>'); background-size:contain; color:rgba(0,0,0,0);">
        Attested Photo
    </div>
    <center class="header">
        <br>
        <h2 style="font-family:'Times New Roman';">I.K.GUJRAL PUNJAB TECHNICAL UNIVERSITY</h2>
        <h4 style="font-family:'Times New Roman'; font-size:18px;">Zonal Youth Festival North Zone</h4>
        <h4 style="text-align: left; margin-left:10vw;">Name of the Host College/Institute: D.A.V. Institute of Engg. and Tech.</h4>
        <h4>on dated __________________________</h4>
        <h4>Eligibility Performa for Participants/Accompanists</h4>
    </center>
    <div>
    <br>
        <ol>
            <li>
                Name of Institute: <u><?=substr($college_name_data[0], 0, 52);?></u><br>
                Registration ID/Online Registration No. : <u><?=$college->registration_number;?></u>
            </li>
            <li>
                Participating as Participant/ Student Accompanist/Accompanist: <?php
                  switch ($student->participating_as) {
                    case 'participant':
                      echo "Participant";
                      break;
                    case 'student_accomp':
                      echo "Student Accompanist";
                      break;
                    case 'accomp':
                      echo "Accompanist";
                      break;
                  }
                ?><br>
            </li>
            <li>
                Name (Block Letters)                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <u><?=strtoupper($student->name)?></u><br>
            </li>
            <li>
                Father's Name (Block Letters) &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <u><?=strtoupper($student->father_name)?></u><br>
            </li>
            <li>
                Date of Birth &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: <u><?=$student->date_birth?></u><br>
            </li>
            <li>
                Class &emsp;&emsp;&emsp;Branch&emsp;&emsp;&emsp;Roll No.&emsp;&emsp;&emsp;University Regd. No.<br>
                <u><?=substr($student->class, 0, 5)?></u>&emsp;&emsp;&emsp;<u><?=substr($student->class, 0, 6)?></u>&emsp;&emsp;&emsp;<u><?=substr($student->class, 0, 6)?></u>&emsp;&emsp;&emsp;<u><?=substr($student->class, 0, 20)?></u>
            </li>
            <li>
                Year of Passing +2 Examination &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: <u><?=$student->year_of_passing?></u><br>
            </li>
            <li>
                Item (s) for participation &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: ____________, ___________<br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;: ____________, ___________<br>
            </li>
            <li>
                Accompanist for Event &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: ________________________<br>
            </li>
            <li>
                  <?php
                    $address_data = explode("\n", $student->address);
                    $address_line_1 = array_shift($address_data);
                    $address_line_2 = implode(", ", $address_data);
                  ?>
                    Address &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: <u><?=$address_line_1?></u><br>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: <u><?=$address_line_2?></u><br>
            </li>
        </ol>
        <br>
        <br>
        <pre>
                                                                <b>Signature of Student Participant/Accompanist</b>
Cerified that particulars given above are correct as per the record of this institute.
        </pre>
        <hr style="border-top:1px solid black;">
        <center>
            <h4>FOR USE OF ORGANIZERS</h4>
        </center>
        <ol>
            <li>Verified the Details &emsp;&emsp;&emsp;&emsp;:</li>
            <li>Eligible/not eligible &emsp;&emsp;&emsp;&emsp;:</li>
            <li>Reason if not eligible &emsp;&emsp;&emsp;:</li>
        </ol>
        <b>Registration Committee</b>

        <div style="text-align:center; float:right;">
            <b>Programme Co-ordinator</b><br>
            <b>(Cultural Affairs)</b>
        </div>
    </div>
</body>
</html>