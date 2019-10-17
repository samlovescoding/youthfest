<?php
	use App\Student;
	use App\College;
	use App\User;
	use App\Event;
	use App\EventRelations;

	$events_data = Event::all();
	$events = [];
	foreach ($events_data as $event) {
		$events[$event->id] = $event;
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Generate ID Cards</title>
		<style>
				*{
					margin:0;
					top:0;
					box-sizing: border-box;
				}
				body{
				}
				.border{
					border:3px solid black;
					width:45%;
					height:500px;
				}
				.image-holder{
					display: inline-block;
				}
				.image{
					position:relative;
					display:block;
					height:75px;
					width:60px;
					background:black;
					margin-left: 10px;
				}
				.row .column-50{
					width:48%;
					display:inline-block;
				}
				.row .column-80{
					width:78%;
					display:inline-block;
					vertical-align: middle;
				}
				.row .column-20{
					width:18%;
					display:inline-block;
					vertical-align:middle;
				}
				.card{
					border:1px solid black;
					width:49%;
					min-height:160px;
					max-height:160px;
					overflow: hidden;
					display:inline-block;
					font-size:9px;
					font-family: 'Montserrat', sans-serif;
					padding:2px 12px;
					
					text-align: center;
					margin-bottom: 10px;
				}
				.card table{
					text-align: left;
				}
				.ptu{
					width:55px;
				}
				.dav{
					width:70px;
				}
				.ptu-holder{
					text-align:left;
				}
				.dav-holder{
					text-align:right;
				}
				.header{
					display: flex;
					justify-content: space-between;
					vertical-align: middle;
				}
				.header div{
					vertical-align: middle;

				}
				.header .title{
					margin-top:10px;
					text-align:center;
					font-weight:bolder;
				}
				.header .ptu{
					margin-top:5px;
				}
		</style>
	</head>
	<body>
		@foreach ($students as $student)
		<?php
			if($student->printed == 1) continue;
			$user = User::find($student->accomp_id);
			$college = College::find($user->college_id);
			$event_relations = EventRelations::where("student", $student->id)->get();
			$event_string = "";
			foreach ($event_relations as $event_relation) {
				$event_string .= $events[$event_relation->event]->name . ", ";
			}
			$event_string = rtrim($event_string, ", ");
		?>
		<div class="card">
				<div class="header">
					<div class="ptu-holder">
						<img src="{{asset('idcard/ptu.png')}}" class="ptu">
					</div>
					<div class="title">
						IKG PTU Zonal Youthfest 2019<br>
						(North Zone)<br>
						October 23<sup>rd</sup> - 25<sup>th</sup> 2019<br>
						<?php
							if($student->participating_as == "participant"){
								echo "Participant";
							}elseif ($student->participating_as == "accomp") {
								echo "Accompanist";
							}else {
								echo "Student Accompanist";
							}
						?>
					</div>
					<div class="dav-holder">
						<img src="{{asset('idcard/dav.png')}}" class="dav">
					</div>
				</div>
				<div class="row">
					<div class="column-80">
						<table>
							<tr>
								<td width="40%">Name:</td>
								<td>{{$student->name}}</td>
							</tr>
							<tr>
								<td>College:</td>
								<td>{{$college->nickname}}</td>
							</tr>
							<tr>
								<td>Events:</td>
								<td>{{$event_string}}</td>
							</tr>
							<tr>
								<td>University Reg No:</td>
								<td>
									@if($student->university_registration == "0")
										Not Assigned
									@else
										{{$student->university_registration}}
									@endif
								</td>
							</tr>
						</table>
					</div>
					<div class="column-20">
						<img src="{{asset('storage/studentPhotos/' . $student->student_photo)}}" class="image">
					</div>
				</div>
				<div style="text-align:center;font-weight:bolder;">Hosted By: DAV Institute Of Engineering And Technology</div>
			</div>	
			<?php
			?>
		@endforeach
		

	</body>
</html>
