<?php
	$conn = new mysqli('localhost','root','','events');
	
    $ename = $_POST['ename'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $link = $_POST['link'];
    $Description = $_POST['Description'];


	// Database connection
	
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        

	 	$stmt = $conn->prepare("insert into eventslist(ename, sdate, edate, link, Description) values(?, ?, ?, ?, ?)");
	 	$stmt->bind_param("sssss", $ename, $sdate, $edate, $link, $Description);

	//mysqli_query($conn, "INSERT INTO eventslist (ename, sdate, edate, link, Description) values ('{$ename}', '{$sdate}', '{$edate}', '{$link}', '{$Description}')");

		$execval = $stmt->execute();
		echo $execval;
		echo "Event added successfully...";
	$stmt->close();
		$conn->close();
	}
?>