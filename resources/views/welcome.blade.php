<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MSC form</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <!-- Styles -->
        
    </head>
    <body class="antialiased">
         <form class="container" action="/api/store" method="POST">
            @csrf
			<div class="inputGroup">
				<h3 class="inputGroupHeader">Personal Information</h3>
				<div class="gridContainer">
						<label for="name"> Applicant's name</label>
						<input class="form-control" required name="name" type="text" />
						<label for="fatherName"> Father's name</label>
						<input class="form-control" required name="fatherName" type="text" />
						<label for="motherName"> Mother's name</label>
						<input class="form-control" required name="motherName" type="text" />
						<label for="gender">Gender</label>
						<select  class="form-control" required name="gender" id="">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
						<label for="religion">Religion</label>
						<select  class="form-control" required name="religion" id="">
							<option value="Islam">Islam</option>
							<option value="Hindu">Hindu</option>
							<option value="Christianity">Christianity</option>
							<option value="Buddhism">Buddhism</option>
						</select>
						<label for="email"> Email</label>
						<input class="form-control" required name="email" type="email" />
						<label for="phone"> Phone </label>
						<input class="form-control" placeholder="(+88)" required name="phone" type="text" />
				</div>	
			
			</div>
			<div  class="inputGroup">
				<h3 class="inputGroupHeader">Address</h3>
				<div class="gridContainer">
						<label for="permanentAddress">Permanent Address</label>
						<input class="form-control" required name="permanentAddress" type="text" />
						<label for="presentAddress">Present Address</label>
						<input class="form-control" required name="presentAddress" type="text" />
				</div>
				
			</div>
			 
			<div class="inputGroup">
				<h3 class="inputGroupHeader">Birth Information</h3>
				<div class="gridContainer">
						<label for="birthDistrict">Birth district</label>
						<input class="form-control" type="text" name="birthDistrict" id="">
						<label for="dateOfBirth">Date of birth</label>
						<input class="form-control" type="date" name="birthDistrict" id="">
						<label for="nationality">Nationality</label>
						<input class="form-control" type="text" name="nationality" id="">
				</div>
			</div>
			
			<div  class="inputGroup">
				<h3 class="inputGroupHeader">Educational Qualification</h3>
				<table  class="table table-striped" >
					<thead>
					 
						<tr class="formTableRow">
							<th></th>
							<th>BSc. Engg / Equivalent</th>
							<th>HSC / Equivalent</th>
							<th>SSC / Equivalent</th>
						</tr>
					</thead>
					<tbody>
						<tr  class="formTableRow">
							<td>
								Passing year
							</td>
							<th>			
								<input placeholder="Type here" class="tableInput form-control" type="text"  name="bsc_passing_yr" id="">
							</th>
							<td>	
							 			
								<input placeholder="Type here" class="tableInput form-control" type="text"   name="hsc_university_name" id="">
							</td>
							<td>	
								 	
								<input placeholder="Type here" class="tableInput form-control" type="text"  name="ssc_university" id="">
							</td>
							
						</tr>

						<tr class="formTableRow">
							<td>Board / university</td>
							<td>				
								<input placeholder="Type here" class="tableInput form-control" type="text" name="bsc_university" id="">
							</td>
							<td>				
								<input placeholder="Type here" class="tableInput form-control" type="text" name="hsc_board_name" id="">
							</td>
							<td>				
								<input placeholder="Type here" class="tableInput form-control" type="text" name="ssc_board_name" id="">
							</td>
							 
						</tr>
						<tr class="formTableRow">
							<td>GPA</td>
							<td>				
								<input placeholder="Type here" class="tableInput form-control" type="text" name="bsc_GPA" id="">
							</td>
							<td>				
								<input placeholder="Type here" class="tableInput form-control" type="text" name="hsc_GPA" id="">
							</td>
							<td>				
								<input placeholder="Type here" class="tableInput form-control" type="text" name="ssc_GPA" id="">
							</td>
							 
						</tr>

					</tbody>
				</table>
			</div>
			<div class="inputGroup">
				<h3 class="inputGroupHeader">Employment Status <span style="font-size: 15px">(Optional)</span></h3>
				<div class="gridContainer">
					<label for="companyName">Company / institute name</label>
					<input class="form-control" type="text" name="companyName" id="">
					<label    for="companyPosition">Position</label>
					<input  class="form-control" type="text" name="companyPosition" id="">
					<label   for="joiningDate">Joining date</label>
					<input  class="form-control" type="date" name="joiningDate" id="">
				</div>
			</div>

			<div class="inputGroup">
				<h3 class="inputGroupHeader">Research <span style="font-size: 15px">(Optional)</span></h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Proposed Research Field</th>
							<th>Supevisor Name</th>
							<th>Position of the Supervisor</th>
						</tr>
					</thead>
				</table>
			</div>
        </form>
    </body>
</html>
