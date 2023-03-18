<?php
// Connect to database
include_once 'db_conn.php';
?>

<form>
<?php
// View the orders
$sql = "SELECT r.name, r.address, r.email, r.total, r.status, r.date_reserved_ts, r.res_id, 
			rd.quantity, 
			ro.room_type, ro.room_price
	FROM reservations r
	JOIN reservation_details rd ON r.res_id = rd.res_id
	JOIN rooms ro ON rd.room_id = ro.room_id
	WHERE r.res_id";
	
$result = mysqli_query($conn, $sql);

// check if any rows were returned
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Room: " . $row['room_type'] . "<br>";
        echo "Quantity: " . $row['quantity'] . "<br>";
        echo "Price: " . $row['room_price'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Address: " . $row['address'] . "<br>";
        echo "Email: " . $row['email'] . "<br><br>";
		echo "Status: " . $row['status'] . "<br>";
        echo "Date Purchased: " . $row['date_reserved_ts'] . "<br>";
		echo "Total Price: " . $row['total'] . "<br><br>";
    }
} else {
    echo "No orders found.";
}
?>

</form>


<html>
<head>
	<meta charset="UTF-8">
	<title>View Order</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<form action="index.php" method="post">
	<input type="submit" value="Reserve Again">
	</form>

</body>
<script src="js/bootstrap.js"></script>
</html>