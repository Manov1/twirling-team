<?php
include 'connection.php';

$result = $conn->query("SELECT * FROM members");
$users = 0;
foreach ($result as $row) {
	$users++;
}
$resultactive = $conn->query("SELECT * FROM members WHERE `Active_membership` = 1");
$active_users = 0;
foreach($resultactive as $row) {
	$active_users++;

}


$resultinvoice = $conn->query("SELECT * FROM invoices");
$invoices = 0;
foreach ($resultinvoice as $row) {
	$invoices++;
}
$resultpaid = $conn->query("SELECT * FROM invoices WHERE `Paid` = 1");
$paid_invoice = 0;
foreach($resultpaid as $row) {
	$paid_invoice++;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<?php include "index.php" ?>
</head>
<body>
	<div class="chart-container">
		<div class="chart 1">
			<canvas id="bar-chart-1" width="500" height="500"></canvas>
		</div>
		<div class="chart 2">
			<canvas id="bar-chart-2" width="500" height="500"></canvas>
		</div>
	</div>
	<script>
		const users = "<?php echo $users; ?>";
		const active_users = "<?php echo $active_users; ?>";

		new Chart(document.getElementById("bar-chart-1"), {
			type: 'bar',
			data: {
			  labels: ["Actieve Klanten", "Totaal Klanten"],
			  datasets: [
				{
				  label: "Aantal (actieve) klanten/leden",
				  backgroundColor: ["purple", "orange","pink","red","cyan"],
				  data: [active_users, users]
				}
			  ]
			},
			options: {
				maintainAspectRatio: false,
				plugins: {
					tooltip: {
						enabled: false,
					},
				}
			}
		});
	</script>
	<script>
		const invoices = "<?php echo $invoices; ?>";
		const paid_invoice = "<?php echo $paid_invoice; ?>";

		new Chart(document.getElementById("bar-chart-2"), {
			type: 'bar',
			data: {
			  labels: ["Betaalde Facturen", "Totaal Facturen"],
			  datasets: [
				{
				  label: "Aantal (betaalde) facturen",
				  backgroundColor: ["purple", "orange","pink","red","cyan"],
				  data: [paid_invoice, invoices]
				}
			  ]
			},
			options: {
				maintainAspectRatio: false,
				plugins: {
					tooltip: {
						enabled: false,
					},
				}
			}
		});
	</script>
</body>
</html>