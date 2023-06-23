<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Application form</title>
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

<body class="container row" style="margin: 50px auto;" ng-app="mscformApp" ng-controller="msc-form-controller">
	<div class="logoContainer">
		<div class="ku_logo">
			<img src="{{ asset('/ku_logo.png') }}" alt="" class="ku_logo_img">
		</div>
		<div class="pageHeadingTextContainer">
			<h2>Khulna University</h2>
			<h5>Master's, PhD, MPhil program Admission form</h5>
		</div>
	</div>
	<form class="col-lg-12" ng-submit="submitMastersForm()">
		@csrf
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Personal Information</h3>
			<div class="gridContainer personalInfoContainer">


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
				<label for="programName">Choose the Degree Program</label>
				<select name="" required ng-model='applicant.programName' class="form-control">
					<option value="">choose one</option>
					<option value="Master_s">Master's</option>
					<option value="PhD">PhD</option>
					<option value="MPhil">MPhil</option>
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
						<th>Exam/Degree</th>
						<th>Board / university</th>
						<th>Subject</th>
						<th>Passing year</th>
						<th>GPA/Result</th>
						<th>Scored Out of:</th>
						<th>
							<div style="display: flex;
																			align-items: flex-end;
																			gap: 10px;">
								<p>Action</p>
								<input type="button" class="btn btn-primary" ng-click="addEducationHistory()"
									value="Add">

							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr class="formTableRow" ng-repeat="educationHistory in educationHistories">
						<th ng-if="educationHistory.index<3"> @{{educationHistory.examName}} </th>
						<td ng-if="educationHistory.index>=3">
							<select name="" ng-model="educationHistory.examName" id="">
								<option value="">Please select</option>

								<option value="Master_s">Master's</option>
								<option value="PhD">PhD</option>
								<option value="MPhil">MPhil</option>
							</select>
						</td>

						<td ng-if="educationHistory.index<2">

							<select class="tableInput form-control" name="" required
								ng-model="educationHistory.board_university" id="">

								<option value="">Select one</option>
								<option value="Barisal">Barisal</option>
								<option value="Dhaka">Dhaka</option>
								<option value="Rajshahi"> Rajshahi</option>
								<option value="Comilla">Comilla</option>
								<option value="Jessore">Jessore</option>
								<option value="Chittagong">Chittagong</option>
								<option value="Sylhet">Sylhet</option>
								<option value="Dinajpur">Dinajpur</option>
								<option value="	Madrasah">Madrasah</option>

							</select>
						</td>
						<td ng-if="educationHistory.index>=2">
							<input type="text" name="" ng-model="educationHistory.board_university" id="">
						</td>
						<td ng-if="educationHistory.index<2">

							<select class="tableInput form-control" name="" required ng-model="educationHistory.subject"
								id="">

								<option value="">Select one</option>
								<option value="Science">Science</option>
								<option value="Arts">Arts</option>
								<option value="Commerce"> Commerce</option>

							</select>
						</td>
						<td ng-if="educationHistory.index>=2">
							<input type="text" name="" ng-model="educationHistory.subject" id="">
						</td>
						</th>
						<td>
							<input type="text" name="" ng-model="educationHistory.passingYear" id="">

						</td>
						<th>
							<input type="text" name="" ng-model="educationHistory.result" id="">

						</th>
						<th>
							<input type="text" name="" ng-model="educationHistory.scored_out_of" id="">

						</th>
						<th> <button ng-disabled="educationHistory.index<3" class="btn btn-disabled"
								ng-click="deleteEducationHistory(educationHistory.index)">Delete</button> </th>

					</tr>


				</tbody>
			</table>
		</div>
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Employment Status <span style="font-size: 15px">(Optional)</span></h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Company / institute name</th>
						<th>Position</th>

						<th>Joining date </th>
						<th>Leaving date</th>
						<th>
							<div style="display: flex; align-items: flex-end;gap: 10px;">
								<p>Action</p>
								<input type="button" class="btn btn-primary" ng-click="addEmployment()" value="Add">

							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="employment in employments">
						<td>
							<input type="text" required name="" ng-model="employment.companyName"
								class="tableInput form-control" id="">
						</td>
						<td>
							<input type="text" required name="" ng-model="employment.companyPosition"
								class="tableInput form-control" id="">
						</td>
						<td>
							<input type="date" required name="" ng-model="employment.joiningDate"
								class="tableInput form-control" id="">
						</td>
						<td>

							<input type="date" required name="" ng-change="setJoiningDate(employment)"
								ng-model="employment.endingDate" class="tableInput form-control" id="">
							<div style="display: flex;">
								<input style="margin: 0;" type="checkbox"
									ng-change="setCurrentlyWorkingFlag(employment)"
									ng-model="employment.isCurrentlyWorking">
								<label style="margin: 0;">Currently working</label>
							</div>


						</td>

						<td>
							<button class="btn btn-danger" ng-click="removeEmployment(employment.index)">Delete</button>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Published Research <span
					ng-if="applicant.programName=='Master_s' || applicant.programName==''"
					style="font-size: 15px">(Optional)</span>
				<span ng-if="!(applicant.programName=='Master_s' || applicant.programName=='')"
					style="font-size: 15px">(At least one)</span>
			</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Research Title</th>
						<th>Publishing Date</th>
						<th>Platform Published on</th>
						<th>Paper Link</th>
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
								type="date" ng-model="research.publishingDate" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" class="tableInput form-control"
								type="text" ng-model="research.publishedOn" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" class="tableInput form-control"
								type="text" ng-model="research.paperLink" id="">
						</td>
						<td>
							<input type="button" class="btn btn-danger" ng-click=" deleteResearch(research.index)"
								value="Remove">

						</td>
					</tr>

				</tbody>
			</table>
		</div>
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Proposed Research <span style="font-size: 15px">(At least one)</span></h3>
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
								<input type="button" class="btn btn-primary" ng-click="addProposedResearch()"
									value="Add">

							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="proposedResearch in proposedResearches" class="formTableRow">
						<td>
							<input placeholder="Type here" autocomplete="off" class="tableInput form-control"
								type="text" ng-model="proposedResearch.title" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" class="tableInput form-control"
								type="text" ng-model="proposedResearch.supervisorName" id="">
						</td>
						<td>
							<input placeholder="Type here" autocomplete="off" class="tableInput form-control"
								type="text" ng-model="proposedResearch.supervisorPosition" id="">
						</td>
						<td>
							<input type="button" class="btn btn-danger"
								ng-click=" deleteProposedResearch(proposedResearch.index)" value="Remove">

						</td>
					</tr>

				</tbody>
			</table>
		</div>
		<div class="inputGroup">
			<h3 class="inputGroupHeader">Photo</h3>
			<div class="photosContainer">
				<div class="userPhotoInputContainer imageInputContainer">
					<label for="photo">
						Applicant's Photo <p style="font-size: 12px;">(The photo size will be 300px by 300px)</p>
					</label>
					<div style="display: flex;
														flex-direction: column;
														align-items: flex-end;
														margin:15px 0">
						<img style="width: 200px; height: 200px; " alt="Preview" id="previewImage" />
						<input onchange="angular.element(this).scope().selectImage(event)" type="file" name="photo"
							id="applicantPhoto" />
					</div>
				</div>
				<div class="userSignatureContainer imageInputContainer">
					<label for="photo">
						Applicant's Signature
					</label>
					<div style="display: flex;
																		flex-direction: column;
																		align-items: flex-end;
																		margin:15px 0">
						<img style="width: 200px;  " alt="Preview" src="{{ asset('/white_bg.png') }}"
							id="previewSignatureImage" />
						<input onchange="angular.element(this).scope().selectSignatureImage(event)" type="file"
							name="signature" id="applicantPhoto" />
					</div>
				</div>
			</div>
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
							<h5>Master's, PhD, MPhil program Admission form</h5>
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
							<img src="@{{applicant.signature}}" style="width: 150px;" alt="" class="applicantSignature">
						</div>
					</div>
					<br><br>
					<table class="table table-striped">
						<tr>
							<th>Discipline Applying to:</th>
							<th colspan="4">@{{applicant.discipline}}</th>
						</tr>
						<tr>
							<th>Degree Applying for:</th>
							<th colspan="4">@{{applicant.programName}}</th>
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
					<h3 ng-if="applicant.companyName!=null">Employment history</h3>
					<table ng-if="applicant.companyName!=null" class=" table table-striped">
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
								<th>Research Title</th>
								<th>Publishing Date</th>
								<th>Platform Published on</th>
								<th>Paper Link</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="research in researchHistory">
								<td>
									@{{research.title}}

								</td>
								<td>
									@{{research.publishingDate}}

								</td>
								<td>
									@{{research.publishedOn}}

								</td>
								<td>
									@{{research.paperLink}}

								</td>
							</tr>
						</tbody>
					</table>
					<h3>Proposed Research Topics</h3>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Supervisor name</th>
								<th>Supervisor Position</th>
							</tr>
						</thead>
						<tbody>
							<tr ng-repeat="proposedResearch in proposedResearches">
								<td>
									@{{proposedResearch.title}}

								</td>
								<td>
									@{{proposedResearch.supervisorName}}

								</td>
								<td>
									@{{proposedResearch.supervisorPosition}}

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


	<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Successfully Applied</h4>
				</div>
				<div class="modal-body">
					Click "Print" to print the submitted form
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" onclick="generatePDF()">Print</button>
				</div>
			</div>
		</div>
	</div>
	<script defer src="{{ asset('js/mscRegistration.js') }}"></script>



</body>

</html>