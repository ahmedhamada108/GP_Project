<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Check Up | Patient History</title>
	<style>
		html, body {
			height: 100%;
			width: 100%;
			margin: 0;
			padding: 5px;
			background-color: #00000024;
			font-family: Arial, sans-serif;
		}
		.qr-code {
			display: block;
			margin-top: 30px;
			text-align: center;
		}
		h2 {
			font-size: 24px;
			margin-top: 30px;
			margin-bottom: 10px;
		}
		.header{
			display: flex;
			background-color: #2196F3;
			color: white;
			padding: 20px;
		}
		h1 {
			display: flex;
			background-color: #2196F3;
			color: white;
			padding: 20px;
			margin: 0;
		}
		h1 img {
			margin-left: 60%;
			width: 70px;
			position: relative;
		}
		h2 {
			font-size: 24px;
			margin-top: 30px;
			margin-bottom: 10px;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		th, td {
			padding: 10px;
			border: 1px solid #ccc;
			text-align: left;
		}
		th {
			background-color: #1787E0;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	 <h1 align="center">
		<a href="{{env('APP_URL')}}" style="color:white;text-decoration: none;">Check Up | Patient History</a>
	</h1> 

	<h2>Patient Information</h2> 
	<table>
		<tr>
			<th>Patient ID</th>
			<td>{{$patient_id}}</td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td>{{$patient_name}}</td>
		</tr>
		<tr>
			<th>Patient Email</th>
			<td>{{$patient_email}}</td>
		</tr>
		<tr>
			<th>Check Date</th>
			<td>{{$check_date}}</td>
		</tr>
	</table>
	<h1>{{$sub_disease}} | {{$disease}}</h1>
		<h2>Disease Description</h2>
		<p>
			{{$description}}
		</p>
			<div class="row" style="float:right;margin-top:50px;margin-right:20%">
				<h3>Scan to See the Ray</h3>
				<img style="width:10pc" src="data:image/png;base64,{{ base64_encode($RayImageQr) }}" alt="QR Code">
			</div>
			<div class="qr-code">
				<div class="row" style="float:left;margin-top:50px;margin-left:20%">
					<h3>Scan to visit Our Website</h3>
					<img style="width:10pc" src="data:image/png;base64,{{ base64_encode($AppUrlQR) }}" alt="QR Code">
	
				</div>
	<div style="background-color: #00000075;color:white;height:97px;margin-top: 430px;">
		<h3 style="position: relative;top: 22%;">This medical history record is stored securely and protected against unauthorized access or disclosure.</h3>
	</div>
</body>
</html>
