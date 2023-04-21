<!DOCTYPE html>
<html>
<body>
    <h1>CAR DETAIL</h1>    
    
    <?php
    $carID = $_GET['id'];
    
    session_start();

    // connect to db
    $servername = "localhost";
    $servUser = "username";
    $servPass = "";
    $dbName = "usersdb";
        
    // create connection
    $conn = new mysqli($servername, $servUser, $servPass, $dbName);

    // check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    // get all cars from cars table
    $query = "SELECT * FROM cars";

    if ($result = $conn->query($query)) 
    {

        // display cars from database
        while ($row = $result->fetch_assoc()) 
        {
            // get details of each car
            $image = $row["img"];
            $id = $row["id"];
            $price = $row["price"];
            $detail = $row["detail"];
            
            //link($target, $linkname);
            if ($id == $carID)
            {
                print "<img src='$image' alt='car'><br />";
                print "<h3>Price: $" . $price . "</h3>";
                print "<h3>Car Detail: $detail<h3>";
            } 
        }
        // free result set
        $result->free();
    }
    $conn->close();

?>
</body>
</html>