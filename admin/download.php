<?php
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');


if (strlen($_SESSION['alogin']) == 0) {
	header("Location: index.php"); 
} else { ?>

<button>hello</button>



	<table border="1">

		<thead>	
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Dob</th>
				<th>Batch</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Interest 1</th>
				<th>Interest 2</th>
				<th>Preference 1</th>
				<th>Preference 2</th>
				<th>Service 1</th>
				<th>service 2</th>
				<th>Service 3</th>
				<th>Amount</th>
				<th>verification status date of verification</th>
			</tr>
		</thead>

		<?php
		$filename = "Registered Users";
		$sql = "SELECT * from `reg` WHERE 1";	
		$query = $dbh->prepare($sql);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		$cnt = 1;
		if ($query->rowCount() > 0) {
			foreach ($results as $result) {

				echo '  	
			<tr>  
			<td>' . $Id = $result->id . '</td> 
			<td>' . $Name = $result->name . '</td> 
			<td>' . $Email = $result->email . '</td>
			<td>' . $Dob = $result->dob . '</td> 
			<td>' . $Batch = $result->batch . '</td> 
			<td>' . $Address = $result->address . '</td> 
			<td>' . $Phone = $result->mobile . '</td> 
			<td>' . $Inter1 = $result->inter1 . '</td> 
			<td>' . $Inter2 = $result->inter2 . '</td>
			<td>' . $Car1 = $result->car1 . '</td> 
			<td>' . $Car2 = $result->car2 . '</td>
			<td>' . $Ser1 = $result->ser1 . '</td>
			<td>' . $Ser2 = $result->ser2 . '</td> 
			<td>' . $Ser3 = $result->ser3 . '</td>
			<td>' . $Amount = $result->amount . '</td> 
			<td>' . $Date = $result->flag. '</td> 					
			</tr>  
			';
			}
		}
		?>
	</table>






	<table border="1">

		<thead>	
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Dob</th>
				<th>Batch</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Interest 1</th>
				<th>Interest 2</th>
				<th>Preference 1</th>
				<th>Preference 2</th>
				<th>Service 1</th>
				<th>service 2</th>
				<th>Service 3</th>
				<th>Ready for payment</th>

			</tr>
		</thead>
			
		<?php
		$filename = "Registered Users";
		$sql = "SELECT * FROM `regstart` r WHERE flag = 0  AND NOT EXISTS ( SELECT * FROM `reg` t WHERE t.email = r.email)";	
		$query = $dbh->prepare($sql);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		$cnt = 1;
		if ($query->rowCount() > 0) {
			foreach ($results as $result) {

				echo '  	
			<tr>  
			<td>' . $Name = $result->name . '</td> 
			<td>' . $Email = $result->email . '</td>
			<td>' . $Dob = $result->dob . '</td> 
			<td>' . $Batch = $result->batch . '</td> 
			<td>' . $Address = $result->address . '</td> 
			<td>' . $Phone = $result->mobile . '</td> 
			<td>' . $Inter1 = $result->inter1 . '</td> 
			<td>' . $Inter2 = $result->inter2 . '</td>
			<td>' . $Car1 = $result->car1 . '</td> 
			<td>' . $Car2 = $result->car2 . '</td>
			<td>' . $Ser1 = $result->ser1 . '</td>
			<td>' . $Ser2 = $result->ser2 . '</td> 
			<td>' . $Ser3 = $result->ser3 . '</td>
			<td>' . $Date = $result->flag. '</td> 		
			</tr>  
			';
			}
		}
		
		?>
	</table>





	<table border="1">

<thead>	
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Dob</th>
		<th>Batch</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Interest 1</th>
		<th>Interest 2</th>
		<th>Preference 1</th>
		<th>Preference 2</th>
		<th>Service 1</th>
		<th>service 2</th>
		<th>Service 3</th>

	</tr>
</thead>
	
<?php
$filename = "Registered Users";
$sql = "SELECT * from `regstart` WHERE `flag` != 0";	
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
	foreach ($results as $result) {

		echo '  	
	<tr>  
	<td>' . $Name = $result->name . '</td> 
	<td>' . $Email = $result->email . '</td>
	<td>' . $Dob = $result->dob . '</td> 
	<td>' . $Batch = $result->batch . '</td> 
	<td>' . $Address = $result->address . '</td> 
	<td>' . $Phone = $result->mobile . '</td> 
	<td>' . $Inter1 = $result->inter1 . '</td> 
	<td>' . $Inter2 = $result->inter2 . '</td>
	<td>' . $Car1 = $result->car1 . '</td> 
	<td>' . $Car2 = $result->car2 . '</td>
	<td>' . $Ser1 = $result->ser1 . '</td>
	<td>' . $Ser2 = $result->ser2 . '</td> 
	<td>' . $Ser3 = $result->ser3 . '</td>
	</tr>  
	';
	}
}

?>
</table>








<?php } ?>

