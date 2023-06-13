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
	<script src="{{ asset('js/jspdf.js') }}"></script>
	<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="{{ asset('js/html2canvas.js') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<!-- Styles -->

</head>

<body class="container row" style="max-width: 60vw;
	padding:20px;
	margin: 50px auto; 
	font-family: 'Times New Roman', Times, serif;
	box-shadow: 0 0 10px #ff973466;" ng-app="mscformApp" ng-controller="msc-form-controller">
	<div class="logoContainer">
		<div class="ku_logo">
			<img src="{{ asset('/ku_logo.png') }}" alt="" class="ku_logo_img">
		</div>
		<div class="pageHeadingTextContainer">
			<h2>Khulna University</h2>
			<h3>Master's Admission form</h3>
		</div>
	</div>
	<form class="col-lg-12" ng-submit="submitMastersForm()">
		@csrf
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Personal Information</h3>
			<div class="gridContainer">
				<label for="photo">
					Applicant's Photo <p style="font-size: 12px;">(The photo size will be 300px by 400px)</p> </label>
				<div style="display: flex;
									flex-direction: column;
									align-items: flex-end;
									margin:15px 0">
					<img style="width: 200px;  " alt="Preview" id="previewImage" />
					<input onchange="angular.element(this).scope().selectImage(event)" type="file" name="photo"
						id="applicantPhoto" />
				</div>
				<label for="name"> Applicant's name </label>
				<input class="form-control" required ng-model="applicant.name" autocomplete="off" type="text" />
				<label for="fatherName"> Father's name</label>
				<input class="form-control" required ng-model="applicant.fatherName" autocomplete="off" type="text" />
				<label for="motherName"> Mother's name</label>
				<input class="form-control" required ng-model="applicant.motherName" autocomplete="off" type="text" />
				<label for="gender">Gender</label>
				<select class="form-control" required ng-model="applicant.gender" id="">
					<option value="">choose one</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<label for="religion">Religion</label>
				<select class="form-control" required ng-model="applicant.religion" id="">
					<option value="">choose one</option>
					<option value="Islam">Islam</option>
					<option value="Hindu">Hindu</option>
					<option value="Christianity">Christianity</option>
					<option value="Buddhism">Buddhism</option>
				</select>
				<label for="email"> Email</label>
				<input class="form-control" required ng-model="applicant.email" autocomplete="off" type="email" />
				<label for="phone"> Phone </label>
				<input class="form-control" placeholder="(+88)" required ng-model="applicant.phone" autocomplete="off"
					type="text" />
				<label for="dateOfBirth">Date of birth</label>
				<input class="form-control" type="date" autocomplete="off" ng-model="applicant.birthDate" id="">
				<label for="nationality">Nationality</label>
				<input class="form-control" type="text" autocomplete="off" ng-model="applicant.nationality" id="">
			</div>

		</div>
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Application information</h3>
			<div class="gridContainer">
				<label for="permanentAddress">Discipline to be applied to</label>
				<select class="form-control" required ng-model="applicant.discipline" id="">
					<option value="">choose one</option>
					<option value="CSE">CSE</option>
					<option value="ECE">ECE</option>
					<option value="URP">URP</option>
					<option value="Architecture">Architecture</option>
				</select>
			</div>
		</div>
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Address </h3>
			<div class="gridContainer">
				<label for="permanentAddress">Permanent Address</label>
				<input class="form-control" required ng-model="applicant.permanentAddress" autocomplete="off"
					type="text" />
				<label for="presentAddress">Present Address</label>
				<input class="form-control" required ng-model="applicant.presentAddress" autocomplete="off"
					type="text" />
			</div>

		</div>



		<div class="inputGroup">
			<h3 class="inputGroupHeader">Educational Qualification</h3>
			<table class="table table-striped">
				<thead>

					<tr class="formTableRow">
						<th></th>
						<th>Passing year</th>
						<th>Board / university</th>
						<th>GPA</th>
					</tr>
				</thead>
				<tbody>
					<tr class="formTableRow">
						<th>
							Bachelor's / Equivalent
						</th>
						<td>
							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="number" ng-model="applicant.hons_passing_yr" id="">
						</td>
						<td>

							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="text" ng-model="applicant.hons_university" id="">
						</td>
						<td>

							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="number" ng-model="applicant.hons_GPA" id="">
						</td>

					</tr>

					<tr class="formTableRow">
						<th>HSC / Equivalent</th>
						<td>
							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="number" ng-model="applicant.hsc_passing_yr" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="text" ng-model="applicant.hsc_board_name" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="number" ng-model="applicant.hsc_GPA" id="">
						</td>

					</tr>
					<tr class="formTableRow">
						<th>SSC / Equivalent</th>
						<td>
							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="number" ng-model="applicant.ssc_passing_yr" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="text" ng-model="applicant.ssc_board_name" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" required class="tableInput form-control"
								type="number" ng-model="applicant.ssc_GPA" id="">
						</td>

					</tr>

				</tbody>
			</table>
		</div>
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Employment Status <span style="font-size: 15px">(Optional)</span></h3>
			<div class="gridContainer">
				<label for="companyName">Company / institute name</label>
				<input class="form-control" autocomplete="off" type="text" ng-model="applicant.companyName" id="">
				<label for="companyPosition">Position</label>
				<input class="form-control" autocomplete="off" type="text" ng-model="applicant.companyPosition" id="">
				<label for="joiningDate">Joining date </label>
				<input class="form-control" autocomplete="off" type="date" ng-model="applicant.joiningDate" id="">
			</div>
		</div>

		<div class="inputGroup">
			<h3 class="inputGroupHeader">Research <span style="font-size: 15px">(Optional)</span></h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Research Field</th>
						<th>Supevisor Name</th>
						<th>Position of the Supervisor</th>
						<th>
							<div style="display: flex;
										align-items: flex-end;
										gap: 10px;">
								<p>Action</p>
								<input type="button" class="btn btn-primary" ng-click="addResearch()" value="Add">

							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="research in researchHistory" class="formTableRow">
						<td>
							<input placeholder="Type here" autocomplete="off" class="tableInput form-control"
								type="text" ng-model="research.title" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" class="tableInput form-control"
								type="text" ng-model="research.supervisorName" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" class="tableInput form-control"
								type="text" ng-model="research.supervisor1Position" id="">
						</td>
						<td>
							<input type="button" class="btn btn-danger" ng-click=" deleteResearch(research.index)"
								value="Remove">

						</td>
					</tr>

				</tbody>
			</table>
		</div>
		<button type="submit" style="width: 100%" class="btn btn-primary ">Apply</button>
	</form>


	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Preview</h4>
				</div>
				<div class="modal-body" id="pdfContainer" style="padding: 20px;
												border: 1px solid #00cbff;
												margin: 10px;
												border-radius: 10px;">
					<div class="logoContainer">
						<div class="ku_logo">
							<img src="{{ asset('/ku_logo.png') }}" alt="" class="ku_logo_img">
						</div>
						<div class="pageHeadingTextContainer">
							<h2>Khulna University</h2>
							<h3>Master's Admission form</h3>
						</div>
					</div>
					<h3>Personal Information</h3>
					<div class="applicantPersonalInfoContainer">
						<div class="personalInfoTable">
							<table class="table table-striped">
								<tr>
									<th>Name</th>
									<td colspan="4">@{{applicant.name}}</td>

								</tr>
								<tr>
									<th>Father's name</th>
									<td>@{{applicant.fatherName}}</td>
									<th>Mother's name</th>
									<td>@{{applicant.motherName}}</td>
								</tr>
								<tr>
									<th>Phone</th>
									<td>@{{applicant.phone}}</td>
									<th>Email</th>
									<td>@{{applicant.email}}</td>
								</tr>
								<tr>
									<th>Gender</th>
									<td>@{{applicant.gender}}</td>
									<th>Birth Date</th>
									<td>@{{applicant.birthDate}}</td>
								</tr>
								<tr>
									<th>Nationality</th>
									<td colspan="4">@{{applicant.nationality}}</td>

								</tr>
								<tr>
									<th>Present Address</th>
									<td colspan="4">@{{applicant.presentAddress}}</td>
								</tr>
								<tr>
									<th>Permanent Address</th>
									<td colspan="4">@{{applicant.permanentAddress}}</td>
								</tr>

							</table>
						</div>
						<div class="applicantImageContainer">
							<img src="@{{applicant.photo}}" alt="" class="applicantImage">
						</div>
					</div>
					<br><br>
					<table class="table table-striped">
						<tr>
							<th>Discipline Applying to:</th>
							<th colspan="4">@{{applicant.discipline}}</th>
						</tr>
					</table>
					<h3>Educational Information</h3>
					<table class="table table-striped">
						<thead>

							<tr class="formTableRow">
								<th></th>
								<th>Passing year</th>
								<th>Board / university</th>
								<th>GPA</th>
							</tr>
						</thead>
						<tbody>
							<tr class="formTableRow">
								<th>
									Bachelor's / Equivalent
								</th>
								<td>
									@{{applicant.hons_passing_yr}}
								</td>
								<td>
									@{{applicant.hons_university}}
								</td>
								<td>
									@{{applicant.hons_GPA}}
								</td>

							</tr>

							<tr class="formTableRow">
								<th>HSC / Equivalent</th>
								<td>
									@{{applicant.hsc_passing_yr}}
								</td>
								<td>
									@{{applicant.hsc_board_name}}
								</td>
								<td>
									@{{applicant.hsc_GPA}}
								</td>

							</tr>
							<tr class="formTableRow">
								<th>SSC / Equivalent</th>
								<td>
									@{{applicant.ssc_passing_yr}}
								</td>
								<td>
									@{{applicant.ssc_board_name}}
								</td>
								<td>
									@{{applicant.ssc_GPA}}
								</td>

							</tr>

						</tbody>
					</table>
					<h3>Employment history</h3>
					<table class="table table-striped">
						<tr>
							<th>Company / institute name</th>
							<td colspan="4">@{{applicant.companyName}}</td>
						</tr>
						<tr>
							<th>Position</th>
							<td>@{{applicant.companyPosition}} </td>
							<th>Joining date</th>
							<td>@{{applicant.joiningDate}} </td>

						</tr>


					</table>
					<h3>Research History</h3>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Research Field</th>
								<th>Supevisor Name</th>
								<th>Position of the Supervisor</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="research in researchHistory">
								<td>
									@{{research.title}}

								</td>
								<td>
									@{{research.supervisorName}}

								</td>
								<td>
									@{{research.supervisor1Position}}

								</td>

							</tr>
						</tbody>
					</table>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-success" ng-click="confirmSubmission()">Submit</button>

					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script defer src="{{ asset('js/mscRegistration.js') }}"></script>



</body>

</html>