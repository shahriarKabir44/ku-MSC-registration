<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Master's form</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
		<script defer src="{{ asset('js/mscRegistration.js') }}"></script>

        <!-- Styles -->
        
    </head>
    <body class="container row" style="max-width: none;padding:20px;margin: 50px auto" ng-app="mscformApp" ng-controller="msc-form-controller" >
         <form class="col-lg-12" id="mscForm">
            @csrf
			<div class="inputGroup">
				<h3 class="inputGroupHeader">Personal Information</h3>
				<div class="gridContainer">
						<label for="photo">Applicant's Photo</label>
						<div style="display: flex;
									flex-direction: column;
									align-items: flex-end;
									margin:15px 0"
							>
							<img   style="width: 200px; aspect-ratio: 1/1" alt="Preview" id="previewImage">
							<input  onchange="angular.element(this).scope().selectImage(event)" type="file" name="photo" id="applicantPhoto">
						</div>
						<label for="name"> Applicant's name</label>
						<input class="form-control" required ng-model="applicant.name" autocomplete="off"  type="text" />
						<label for="fatherName"> Father's name</label>
						<input class="form-control" required ng-model="applicant.fatherName" autocomplete="off"  type="text" />
						<label for="motherName"> Mother's name</label>
						<input class="form-control" required ng-model="applicant.motherName" autocomplete="off"  type="text" />
						<label for="gender">Gender</label>
						<select  class="form-control" required ng-model="applicant.gender" id="">
							<option value="">choose one</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
						<label for="religion">Religion</label>
						<select  class="form-control" required ng-model="applicant.religion" id="">
							<option value="">choose one</option>
							<option value="Islam">Islam</option>
							<option value="Hindu">Hindu</option>
							<option value="Christianity">Christianity</option>
							<option value="Buddhism">Buddhism</option>
						</select>
						<label for="email"> Email</label>
						<input class="form-control" required ng-model="applicant.email" autocomplete="off"  type="email" />
						<label for="phone"> Phone </label>
						<input class="form-control" placeholder="(+88)" required ng-model="applicant.phone" autocomplete="off"  type="text" />
						<label for="dateOfBirth">Date of birth</label>
						<input class="form-control" type="date" autocomplete="off"  ng-model="applicant.birthDate" id="">
						<label for="nationality">Nationality</label>
						<input class="form-control" type="text" autocomplete="off"  ng-model="applicant.nationality" id="">
				</div>	
			
			</div>
			<div  class="inputGroup">
				<h3 class="inputGroupHeader">Address</h3>
				<div class="gridContainer">
						<label for="permanentAddress">Permanent Address</label>
						<input class="form-control" required ng-model="applicant.permanentAddress" autocomplete="off"  type="text" />
						<label for="presentAddress">Present Address</label>
						<input class="form-control" required ng-model="applicant.presentAddress" autocomplete="off"  type="text" />
				</div>
				
			</div>
			 
			 
			
			<div  class="inputGroup">
				<h3 class="inputGroupHeader">Educational Qualification</h3>
				<table  class="table table-striped" >
					<thead>
					 
						<tr class="formTableRow">
							<th></th>
							<th>Passing year</th>
							<th>Board / university</th>
							<th>GPA</th>
						</tr>
					</thead>
					<tbody>
						<tr  class="formTableRow">
							<th>
								Bachelor's / Equivalent	
							</th>
							<td>			
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="number"  ng-model="applicant.hons_passing_yr" id="">
							</td>
							<td>	
							 			
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="text"   ng-model="applicant.hons_university" id="">
							</td>
							<td>	
								 	
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="number"  ng-model="applicant.hons_GPA" id="">
							</td>
							
						</tr>

						<tr class="formTableRow">
							<th>HSC / Equivalent</th>
							<td>				
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="number" ng-model="applicant.hsc_passing_yr" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="text" ng-model="applicant.hsc_board_name" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="number" ng-model="applicant.hsc_GPA" id="">
							</td>
							 
						</tr>
						<tr class="formTableRow">
							<th>SSC / Equivalent</th>
							<td>				
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="number" ng-model="applicant.ssc_passing_yr" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="text" ng-model="applicant.ssc_board_name" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off" required class="tableInput form-control" type="number" ng-model="applicant.ssc_GPA" id="">
							</td>
							 
						</tr>

					</tbody>
				</table>
			</div>
			<div class="inputGroup">
				<h3 class="inputGroupHeader">Employment Status <span style="font-size: 15px">(Optional)</span></h3>
				<div class="gridContainer">
					<label for="companyName">Company / institute name</label>
					<input class="form-control" autocomplete="off"  type="text" ng-model="applicant.companyName" id="">
					<label    for="companyPosition">Position</label>
					<input  class="form-control" autocomplete="off"  type="text" ng-model="applicant.companyPosition" id="">
					<label   for="joiningDate">Joining date</label>
					<input  class="form-control" autocomplete="off"  type="date" ng-model="applicant.joiningDate" id="">
				</div>
			</div>

			{{-- <div class="inputGroup">
				<h3 class="inputGroupHeader">Research <span style="font-size: 15px">(Optional)</span></h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Proposed Research Field</th>
							<th>Supevisor Name</th>
							<th>Position of the Supervisor</th>
						</tr>
					</thead>
					<tbody>
						<tr class="formTableRow">
 							<td>																							
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_researchTitle1" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_supervisorName1" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_supervisor1Position" id="">
							</td>
							 
						</tr>
						<tr class="formTableRow">
 							<td>				
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_researchTitle2" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_supervisorName2" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_supervisor2Position" id="">
							</td>
							 
						</tr>
						<tr class="formTableRow">
 							<td>				
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_researchTitle3" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_supervisorName3" id="">
							</td>
							<td>				
								<input placeholder="Type here" autocomplete="off"  class="tableInput form-control" type="text" name="research_supervisor3Position" id="">
							</td>
							 
						</tr>
					</tbody>
				</table>
			</div> --}}
			<button type="submit" style="width: 100%" class="btn btn-primary ">Apply</button>
        </form>
    </body>
</html>
