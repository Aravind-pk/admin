<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0 && strlen($_SESSION['register'])==0 ) {
	header('location:fin.php');
} else {
	if (isset($_GET['del']) && isset($_GET['name'])) {
		$id = $_GET['del'];
		$name = $_GET['name'];

		$sql = "delete from `regstart` WHERE phone=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();

		$msg = "Data Deleted successfully";
	}

	if (isset($_REQUEST['confirm'])) {
		$aeid = intval($_GET['confirm']);
		$memstatus = date("Y-m-d");
		$sql = "UPDATE `regstart` SET flag=:status WHERE  phone=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $memstatus, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();
		$msg = "Changes Sucessfully";
	}

	// if (isset($_REQUEST['confirm'])) {
	// 	$aeid = intval($_GET['confirm']);
	// 	$memstatus = 0;
	// 	$sql = "UPDATE `regstart` SET status=:status WHERE  phone=:aeid";
	// 	$query = $dbh->prepare($sql);
	// 	$query->bindParam(':status', $memstatus, PDO::PARAM_STR);
	// 	$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
	// 	$query->execute();
	// 	$msg = "Changes Sucessfully";
	// }

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

		<title>Manage Users</title>

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
						<div class="col-sm-1 col-lg-12 col-md-12">

							<h2 class="page-title">Unpaid Students</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">List Users</div>
								<div class="panel-body">
									<?php if ($error) { ?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php } ?>
									<table id="zctb" class="display table table-striped table-bordered table-hover table-responsive-md table-responsive-sm" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>ID</th>
												<th>NAME</th>
												<th>EMAIL</th>
												<th>BATCH</th>
												<th>PHONE</th>
												<th>READY TO PAY</th>
											</tr>
										</thead>

										<tbody>

											<?php 
											$sql = "SELECT * FROM `regstart` r WHERE flag = 0  AND NOT EXISTS ( SELECT * FROM `reg` t WHERE t.email = r.email)";
											// $sql = "SELECT * FROM register r WHERE NOT EXISTS ( SELECT * FROM payments t WHERE t.user_id = r.email and flag = 0) ";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {				?>
													<tr>
														<td><?php echo htmlentities($cnt); ?></td>
														<td><?php echo htmlentities($result->id); ?></td>
														<td><?php echo htmlentities($result->name); ?></td>
														<td><?php echo htmlentities($result->email); ?></td>
														<td><?php echo htmlentities($result->batch); ?></td>
														<td><?php echo htmlentities($result->phone); ?></td>
														<td><?php echo htmlentities($result->flag); ?></td>
														<td>
                                                    <a href="unpaid.php?confirm=<?php echo htmlentities($result->phone);?>" onclick="return confirm('Do you really want to Verify Offline Payment')">Verify <i class="fa fa-check-circle"></i></a> 
                                                    &emsp;
													<a href="edit_unpaid.php?edit=<?php echo $result->phone; ?>" onclick="return confirm('Do you want to Edit');"><i class="fa fa-pencil" style="color:blue">edit</i></a>&nbsp;&nbsp;
													&emsp;
															<!-- <a href="edit-pay.php?edit=<?php echo $result->id; ?>" onclick="return confirm('Do you want to Edit');"><i class="fa fa-pencil" style="color:blue">edit</i></a>&nbsp;&nbsp; -->
															<a href="unpaid.php?del=<?php echo $result->phone; ?>&name=<?php echo htmlentities($result->contact_email); ?>" onclick="return confirm('Do you want to Delete');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
														</td> 
													</tr>
											<?php $cnt = $cnt + 1;
												}
											} ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				setTimeout(function() {
					$('.succWrap').slideUp("slow");
				}, 3000);
			});
		</script>

	</body>

	</html>
<?php } ?>
