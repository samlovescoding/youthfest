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

  $ievent_string = $event_string;
  $aevent_string = "";

  if($student->participating_as == "accomp"){
    $ievent_string = "";
      $aevent_string = $event_string;
  }

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
        line-height:25px;
    }
    </style>
</head>
<body>
    <h5 style="float:right; font-family:'Times New Roman';">Performa-I</h5>
    <div class="attested" style="font-family:'Times New Roman'; border:1px solid black; display:inline-block;line-height:140px; padding:0px 10px;position: absolute;top:50px; right:0px; 
    background:url('/storage/studentPhotos/<?=$student->student_photo?>'); background-repeat:no-repeat; background-size:cover; color:rgba(0,0,0,0);">
        Attested Photo
    </div>
    <center class="header">
        <br>
        <h2 style="font-family:'Times New Roman';">I.K.GUJRAL PUNJAB TECHNICAL UNIVERSITY</h2>
        <h4 style="font-family:'Times New Roman'; font-size:18px;">Zonal Youth Festival North Zone</h4>
        <h4 style="">Name of the Host College/Institute: DAVIET Jalandhar</h4>
        <h4>23<sup>rd</sup> - 25<sup>th</sup> October 2019</h4>
        <h4>Eligibility Performa for Participants/Accompanists</h4>
    </center>
    <div>
    <br>
        <ol>
            <li>
                Name of Institute: <u><?=substr($college_name_data[0], 0, 52);?></u><br>
                Registration ID/Online Registration No. : <u><?=$college->uuid;?>/2019</u>
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
                Date of Birth &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: <u><?php $date = DateTime::createFromFormat("Y-m-d", $student->date_birth); echo $date->format("d-m-Y")?></u><br>
            </li>
            <li>
                <table style="border:0px;">
                    <tr>
                        <td>Class</td>
                        <td>Branch</td>
                        <td>Roll No.</td>
                        <td>University Registration</td>
                    </tr>
                    <tr>
                        <td><?=$student->class?></td>
                        <td><?=$student->branch?></td>
                        <td><?=$student->roll_number?></td>
                        <td><?php if($student->university_registration == "0") echo "_______"; else echo $student->university_registration;?></td>
                    </tr>
                </table>

            </li>
            
            <li>
                Year of Passing +2 Examination &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: <u><?=$student->year_of_passing?></u><br>
            </li>
            <li>
                Item (s) for participation &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: <div style="text-align:justify; display:inline-block;  text-decoration:underline; max-width:250px; vertical-align:top; line-height:18px;">{{$ievent_string}}</div><br>
            </li>
            <li>
                Accompanist for Event &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;: <div style="text-align:justify; display:inline-block;  text-decoration:underline; max-width:250px; vertical-align:top; line-height:18px;">{{$aevent_string}}</div><br>
            </li>
            <li>
                Address &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: <div style="text-align:justify; display:inline-block;  text-decoration:underline; max-width:250px; vertical-align:top; line-height:18px;"><?=$student->address;?></div><br>
            </li>
        </ol>
        <br>
        <pre>
                                                                <b>Signature of Student Participant/Accompanist</b>
Cerified that particulars given above are correct as per the record of this institute.
        </pre>
        <br>
        <br>
        <div style="float:right; margin-top:-20px; font-weight:bolder; margin-right:100px;">
            Signature<br>
            Principal/Director<br>
            Institution _______
        </div>
        <div style="font-weight:bolder;">
            Signature<br>
            Cultural Co-ordinator
        </div>
        
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