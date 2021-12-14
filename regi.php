<?php
include('includes/config.php');
if (isset($_POST['Save'])) {
	$flag = 0;
	$temp = $_POST['interest'];
	if ((count($temp) != 2)) {
		$error = "Enter atleast 2";
		$flag = 1;
	} else {
		$inter1 = $temp[0];
		$inter2 = $temp[1];
	}
	$temp = $_POST['career'];
	if ((count($temp) != 2)) {
		echo "<script type='text/javascript'>alert('Enter 2 career preferences');</script>";
		$flag = 1;
	} else {
		$car1 = $temp[0];
		$car2 = $temp[1];
	}
	$temp = $_POST['services'];
	if ((count($temp) != 3)) {
		echo "<script type='text/javascript'>alert('Enter 3 Services');</script>";
		$flag = 1;
	} else {
		$ser1 = $temp[0];
		$ser2 = $temp[1];
		$ser3 = $temp[2];
	}
	$temp = $_POST['batch'];
	if ((count($temp) != 1)) {
		echo "<script type='text/javascript'>alert('Enter only 1 batch');</script>";
		$flag = 1;
	} else {
		$batch = $temp[0];
	}
	$mobile = $_POST['mobile'];
	if(strlen($mobile)!=10){
	    echo "<script type='text/javascript'>alert('Enter correct mobile number');</script>";
		$flag = 1;
	}
	if ($flag == 0) 
		// echo "<script type='text/javascript'>alert('Flag error');</script>";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$password = md5($_POST['password']);

		$sql = "SELECT * FROM `register` WHERE `email` = :email ";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			echo "<script type='text/javascript'>alert('Sorry already registerd Thankyou');</script>";
			header('location:regi.php');
		} else {

			$sql = "SELECT COUNT(*) as total FROM `register` WHERE `batch` = :batch ";
			$query = $dbh->prepare($sql);
			$query->bindParam(':batch', $batch, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			foreach ($results as $result) {
				$cnt = $result->total;
			}
			if ($cnt < 10) {
				$cnt = "0" . $cnt;
			}
			$id = "ISTETKMCE/20/" . $batch . "/0/" . $cnt;

			// echo ($id . '' . $name . '' . $email . '' . $batch . '' . $dob . '' . $address . '' . $mobile . '' . $inter1 . '' . $inter2 . '' . $car1 . '' . $car2 . '' . $ser1 . '' . $ser2 . '' . $ser3 . '' . $password . '');

			// :id, :name, :email, :dob, :batch, :address, :mobile, :inter1, :inter2, :car1, :car2, :ser1, :ser2, :ser3, :pass

			$sql = "INSERT INTO `register`(`id`, `name`, `email`, `dob`, `batch`, `address`, `mobile`, `inter1`, `inter2`, `car1`, `car2`, `ser1`, `ser2`, `ser3`, `password`) VALUES (:id, :name, :email, :dob, :batch, :address, :mobile, :inter1, :inter2, :car1, :car2, :ser1, :ser2, :ser3, :pass)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':id', $id, PDO::PARAM_STR);
			$query->bindParam(':name', $name, PDO::PARAM_STR);
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':dob', $dob, PDO::PARAM_STR);
			$query->bindParam(':batch', $batch, PDO::PARAM_STR);
			$query->bindParam(':address', $address, PDO::PARAM_STR);
			$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
			$query->bindParam(':inter1', $inter1, PDO::PARAM_STR);
			$query->bindParam(':inter2', $inter2, PDO::PARAM_STR);
			$query->bindParam(':car1', $car1, PDO::PARAM_STR);
			$query->bindParam(':car2', $car2, PDO::PARAM_STR);
			$query->bindParam(':ser1', $ser1, PDO::PARAM_STR);
			$query->bindParam(':ser2', $ser2, PDO::PARAM_STR);
			$query->bindParam(':ser3', $ser3, PDO::PARAM_STR);
			$query->bindParam(':pass', $password, PDO::PARAM_STR);
			$query->execute();
			$sql = "SELECT * FROM `register` WHERE `id` = :id ";
			$query = $dbh->prepare($sql);
			$query->bindParam(':id', $id, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			if ($query->rowCount() > 0) {
				echo "<script type='text/javascript'>alert('Login for continue with payment');</script>";
				echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}
		}
	}
?>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
	<title>ISTE Registration</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="reg/css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="reg/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="reg/css/style.css" />
	<style>
		.fa,
		.fas {
			color: rgb(47, 56, 65);
		}

		.btn {
			background: #3e4061;
			color: white;


		}
	</style>
</head>

<body>
	<div class="page-content">
		<div class="container form-v1-content">
			<div class="wizard-form">
				<form class="form-register" method="post">
					<div id="form-total">
						<!-- SECTION 1 -->
						<br>

						<h2 style=" color:purple; text-align: center;">
							<img style="text-align: left; width:100px; height : 100px;" src="iste.png">
							<!-- <p class="step-icon"><span>01</span></p> -->
							<span class="step-text">REGISTRATION</span>
						</h2>
						<br>
						<br>

						<h2 style="color:purple; text-align: center;">
							<!-- <p class="step-icon"><span>01</span></p> -->
							<span class="step-text">Personal Infomation</span>
						</h2>
						<br>
						<div class="inner">
							<div class="form-row mt-1 mb-1">
							<div class="form-row  col-sm-12">
								<div class="form-holder form-holder-2 col-sm-6">
									<fieldset>
										<legend><i class="fas fa-address-book "> Name</i></legend>
										<input type="text" name="name" id="your_name" class="form-control" placeholder="" required>
									</fieldset>
								</div>
								<div class="form-holder form-holder-2 col-sm-6">
									<fieldset>
										<legend><i class="fas fa-mail-bulk"> Email</i></legend>
										<input type="email" name="email" id="email" class="form-control " pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="@tkmce.ac.in" required>
									</fieldset>
									<div class="alert" role="alert" style="display: none;" id="emailalert">
										<h6 class="p-0 m-0"> * please enter a valid email</h6>
									</div>
								</div>
							</div>
							<div class="form-row col-sm-12">
								<div class="form-holder col-sm-6">
									<fieldset>
										<legend><i class="fa fa-calendar" aria-hidden="true"></i> Date of Birth
										</legend>
										<input type="date" class="form-control" id="first-name" name="dob" placeholder="Date of Birth" required>
									</fieldset>
								</div>
								<div class=" form-group col-sm-6 col-12 p-2">

									<div class="dropdown open drop-1">
										<button class="btn  dropdown-toggle w-100" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<h5 class='title_c'>Batch</h5>
										</button>
										<div class="dropdown-menu w-100 pl-3 pr-3" aria-labelledby="triggerId">
											<p class="dropdown-item pt-0 pb-0">
												<div class="form-check">
													<div id="check1" name="check1">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="M1A">
															M1A-MECH
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="M1B">
															M1B-MECH
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="M1C">
															M1C-MECH
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="T1A">
															T1A-EC
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="T1B">
															T1B-EC
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="E1A">
															E1A-EEE
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="E1B">
															E1B-EEE
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="H1">
															H1-CHEM
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="AR1A">
															AR1A-ARCH
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="AR1B">
															AR1B-ARCH
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="R1A">
															R1A-CS
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="R1B">
															R1B-CS
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="C1A">
															C1A-CIVIL
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="batch[]" id="batch" value="C1B">
															C1B-CIVIL
														</label>
													</div>
													<script type="text/javascript">
														$(document).ready(function() {
															$("input[name='batch[]']").change(function() {
																var maxAllowed = 2;
																var cnt = $("input[name='batch[]']:checked").length;
																if (cnt > maxAllowed) {
																	$(this).prop("checked", "");
																	alert('Select maximum ' + maxAllowed + ' batchs!');
																}
															});
														});
													</script>
												</div>

											</p>

										</div>
									</div>
								</div>
								<!-- <div class="form-holder col-sm-6">
									<fieldset>
										<legend><i class="fa fa-book" aria-hidden="true"> Batch</i></legend>
										<input title="Eg. T1B/R1 etc" type="text" class="form-control" id="last-name" name="batch" placeholder="Eg: T1A" required>
									</fieldset>
								</div> -->
							</div>
							<div class="form-row col-sm-12">
								<div class="form-holder form-holder-2 col-sm-6">
									<fieldset>
										<legend><i class="fas fa-mobile"> Mobile No </i></legend>
										<input type="number" class="form-control" id="phone" name="mobile" placeholder="777 7777 777" required>
									</fieldset>
									<div class="alert" role="alert" style="display: none;" id="phonealert">
										<h6 class="p-0 m-0"> * please enter a valid phone number</h6>
									</div>
								</div>
								<div class="form-holder form-holder-2 col-sm-6">
									<fieldset>
										<legend><i class="fas fa-lock"></i> Password</legend>
										<input type="password" class="form-control" id="ssn" name="password" required>
									</fieldset>
								</div>
							</div>
							<div class="form-row col-sm-12">
								<div class="form-holder form-holder-2">
									<fieldset>
										<legend><i class="fas fa-address-book "> Address</i></legend>
										<textarea name="address" style="border: 0px; width: 100%; resize: none;" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
									</fieldset>
								</div>
							</div>
						</div>
						<!-- SECTION 2 -->
						<br>
						<h2 style="color:purple; text-align: center;">
							<!-- <p class="step-icon"><span>02</span></p> -->
							<span class="step-text">Add your Interests</span>
						</h2>
						<br>
						<div>
							<h5 class="checkbox_head" style="color:rgb(109, 111, 216); text-align:center;">Select only 2 Interests,
								2 Career preferences and 3 Services</h5>
							<div class="form-row mt-1 mb-1">

								<div class=" form-group col-sm-6 col-12 p-2">

									<div class="dropdown open drop-1">
										<button class="btn  dropdown-toggle w-100" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<h5 class='title_c'>Special Interest</h5>
										</button>
										<div class="dropdown-menu w-100 pl-3 pr-3" aria-labelledby="triggerId">
											<p class="dropdown-item pt-0 pb-0">
												<div class="form-check">
													<div id="check1" name="check1">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="interest[]" id="interest" value="Sports">
															Sports
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="interest[]" id="interest" value="Games">
															Games
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="interest[]" id="interest" value="Reading">
															Reading
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="interest[]" id="interest" value="Literacy">
															Literary
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="interest[]" id="interest" value="Drama">
															Drama
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="interest[]" id="interest" value="Music">
															Music
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="interest[]" id="interest" value="Photography">
															Photography
														</label>
													</div>
													<script type="text/javascript">
														$(document).ready(function() {
															$("input[name='interest[]']").change(function() {
																var maxAllowed = 2;
																var cnt = $("input[name='interest[]']:checked").length;
																if (cnt > maxAllowed) {
																	$(this).prop("checked", "");
																	alert('Select maximum ' + maxAllowed + ' Interests!');
																}
															});
														});
													</script>
												</div>

											</p>

										</div>
									</div>
								</div>



								<div class=" form-group col-sm-6 col-12 p-2">

									<div class="dropdown open  drop-1">
										<button class="btn  dropdown-toggle w-100" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<h5 class='title_c'>Career Preference</h5>
										</button>
										<div class="dropdown-menu w-100 pr-3 pl-3" aria-labelledby="triggerId">
											<p class="dropdown-item" href="#">
												<div class="form-check">
													<div id="check2" name="check2">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="career[]" id="" value="Teaching">
															Teaching
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="career[]" id="" value="Research Work">
															Research Work
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="career[]" id="" value="Government Job">
															Govt. Job
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="career[]" id="" value="Public Sector">
															Public Sector Undertaking
														</label>
													</div>


													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="career[]" id="" value="Private">
															Private Industry
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="career[]" id="" value="Studies">
															Higher Studies
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="career[]" id="" value="Management Studies">
															Management Studies
														</label>
													</div>
													<script type="text/javascript">
														$(document).ready(function() {
															$("input[name='career[]']").change(function() {
																var maxAllowed = 2;
																var cnt = $("input[name='career[]']:checked").length;
																if (cnt > maxAllowed) {
																	$(this).prop("checked", "");
																	alert('Select maximum ' + maxAllowed + ' Preferences!');
																}
															});
														});
													</script>
												</div>

											</p>

										</div>
									</div>
								</div>

								<div class=" form-group col-sm-12 col-12 p-2">
									<div class="dropdown open drop-1">
										<button class="btn dropdown-toggle w-100" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<h5 class='title_c'>Type of services</h5>
										</button>
										<div style="font-size: small;" class="dropdown-menu w-100 pr-4 pl-4" aria-labelledby="triggerId">
											<p class="dropdown-item" href="#">
												<div class="form-check">
													<div id="check3" name="check3">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="services[]" id="" value="Coaching for competitive examination, job interview">
															Coaching for competitive examination, job interview
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="services[]" id="" value="Supervisory and
															communication skill development">
															Supervisory and
															communication skill
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="services[]" id="" value="Training for self-employment">
															Training for self-employment
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="services[]" id="" value="Guidance on job opportunities in India and abroad">
															Guidance on job opportunities
															in India and abroad
														</label>
													</div>


													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="services[]" id="" value="Arranging training in industries and visit to industry">
															Arranging training in industries and visit to industry
														</label>
													</div>

													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="services[]" id="" value="Awareness on social, cultural and ethical values and norms">
															Awareness on social, cultural and ethical values and
															norms
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" name="services[]" id="" value="General counselling services">
															General counselling services
														</label>
													</div>
													<script type="text/javascript">
														$(document).ready(function() {
															$("input[name='services[]']").change(function() {
																var maxAllowed = 3;
																var cnt = $("input[name='services[]']:checked").length;
																if (cnt > maxAllowed) {
																	$(this).prop("checked", "");
																	alert('Select maximum ' + maxAllowed + ' Services!');
																}
															});
														});
													</script>
												</div>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- SECTION 3 -->
						<br>
						<h2 style="color:purple; text-align: center;">
							<!-- <p class="step-icon"><span>03</span></p> -->
							<span class="step-text">Declaration</span>
						</h2>
						<br>
						<p style=" color:rgb(109, 111, 216); padding: 10px;" "font-size:small;font-weight:500;font-family:sans-serif d-flex text-align-justify">
							I agree to abide by the rules and the regulations of the ISTE regarding Student
							Membership and
							functioning of Student Chapters.Single Student Membership will not be entertained. <br>
							Kindly apply
							along with all Students and through ISTE Student Chapter only.</p>
						<div style="text-align:center;"> <button name="Save" type="submit" class="btn btn-lg pt-1 pb-1">Register</button></div>
						<div style="text-align:center;"> </div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="reg/js/jquery-3.3.1.min.js"></script>
	<!-- <script src="registration/js/jquery.steps.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="reg/js/main.js"></script>
</body>

</html>