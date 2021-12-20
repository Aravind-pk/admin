<?php
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');


if (strlen($_SESSION['alogin']) == 0) {
	header("Location: index.php"); 
} else { ?>

<center>


<div style="height:100px"></div>

<h3> Download exel</h3>



<button onclick="download_table_as_csv('online');">Online paid</button>
<button onclick="download_table_as_csv('offlinepaid');">Offline paid</button>
<button onclick="download_table_as_csv('offline');"> Upaid & waiting for online payment</button>

</center>
<div style="height:100px"></div>



	<table id="online" border="1">

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
				<th>verification status /date of verification</th>
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
			<td>' . $Address = $result->addr . '</td> 
			<td>' . $Phone = $result->phone . '</td> 
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






	<table id="offline" border="1">

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
			<td>' . $Address = $result->addr . '</td> 
			<td>' . $Phone = $result->phone . '</td> 
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





	<table id="offlinepaid" border="1">

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
	<td>' . $Address = $result->addr . '</td> 
	<td>' . $Phone = $result->phone . '</td> 
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


<script>


function download_table_as_csv(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            // Clean innertext to remove multiple spaces and jumpline (break csv)
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'export_' + table_id + '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>









<?php } ?>

