<!DOCTYPE html>
<html>
<body>

<!-- use form to post username/password -->
<form action="" method="post"> 

<!-- get username/password from user -->
Username: <input type="text" name="username"><br />
Password: <input type="text" name="password"><br />
<input type="submit" name ="login" value="Login">

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

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    // create db and tables
    /*$createDB = "CREATE DATABASE usersdb";
    //$stmt = $conn->query($createDB);
    //$stmt->execute();
    $stmt = "CREATE TABLE users (
            username TEXT PRIMARY KEY,
            pass  TEXT
            )";
    $stmt = $conn->query($stmt);
    $stmt->execute();
    $stmt = "INSERT INTO users
            VALUES (newUser, BestPassword)";
    $stmt = $conn->query($stmt);
    $stmt->execute();
    */
    // find user in User table
    $query = "SELECT * FROM users";

  if ($result = $conn->query($query)) 
  {

    // search users table for username and password
    while ($row = $result->fetch_assoc()) 
    {
        $field1name = $row["username"];
        $field2name = $row["pass"];

        // if username and password match, proceed
        if ($field1name == $username and $field2name == $password) 
        {
          // redirect to dashboard or homepage
          header("Location: home.php");
          exit();
        }
    }
    /* free result set */
    $result->free();
    print "Invalid username or password";
  }
    $conn->close();
}

?>

</form>

</body>
</html>