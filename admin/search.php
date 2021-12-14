<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['search'])) {
		// echo "<script>alert('Hello');</script>";
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$sql = "SELECT * FROM `register`,`payments` WHERE name=:user AND mobile=:mobile";
		$query = $dbh->prepare($sql);
		$query->bindParam(':user', $name, PDO::PARAM_STR);
		$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			foreach ($results as $result) {
				$nam = ".$result->created_date.";
				$msg = ".$result->batch.";
				$pay = ".$result->payment_id.";
			}
		} else {
			$error = "Sorry No user exists";
		}
	}
?>

	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">

		<title>Search User</title>

		<link rel="stylesheet" href="csss/styles.css">
		<link rel="stylesheet" href="csss/style.css">
		<link rel="stylesheet" href="csss/trial.css" />
		<link rel="stylesheet" href="csss/fileinput.min.css">
		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">

		<script type="text/javascript" src="../vendor/countries.js"></script>
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #dd3d36;
				color: #fff;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #5cb85c;
				color: #fff;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>

	</head>

	<body>

		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h3 class="page-title">Search User</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Search</div>
										<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>DATE</strong>:<?php echo htmlentities($nam); ?>&nbsp;<strong>BATCH</strong>:<?php echo htmlentities($msg); ?>&nbsp;<strong>PAY</strong>:<?php echo htmlentities($pay); ?> </div><?php } ?>

										<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="name" class="form-control" placeholder="Name">
													</div>
													<label class="col-sm-2 control-label">Mobile No<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="number" name="mobile" class="form-control" required placeholder="Mobile No">
													</div>
												</div>


												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-primary" name="search" type="submit">Search</button>
													</div>
												</div>

											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>
<?php } ?>