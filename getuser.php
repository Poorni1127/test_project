
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','monty','some_pass','mtc');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM mtc_alert WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Alert_date</th>
<th>Route</th>
<th>Trip</th>
<th>Time</th>
<th>CSV/Plot</th>
<th>Fleet</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['alert_date'] . "</td>";
    echo "<td>" . $row['route'] . "</td>";
    echo "<td>" . $row['trip'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td><a href='#'>" . $row['csv/plot'] . "</a></td>";
    echo "<td>" . $row['fleet'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 