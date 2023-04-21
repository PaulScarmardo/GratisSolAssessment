<!DOCTYPE html>
<html>
<body>
    <h1>HOME PAGE</h1>
    
<?php
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

    // create db and tables
    /*$createDB = "CREATE DATABASE usersdb";
    //$stmt = $conn->query($createDB);
    //$stmt->execute();
    $stmt = "CREATE TABLE cars (
            img TEXT,
            id INT PRIMARY KEY,
            price INT,
            detail TEXT
    );";
    $stmt = $conn->query($stmt);
    $stmt->execute();
    $stmt = "INSERT INTO cars
            VALUES ('car_image.png', 1, 5, car 1 detail)";
    $stmt = $conn->query($stmt);
    $stmt->execute();
    $stmt = "INSERT INTO cars
            VALUES ('car2.jgp', 2, 10, car 2 detail)";
    $stmt = $conn->query($stmt);
    $stmt->execute();
    */

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
            
            $car = "<a href='cardetail.php?id=$id'><img src='$image' alt='car'></a>";
            print $car;
        }
        // free result set
        $result->free();
    }
    $conn->close();

?>

</body>
</html>