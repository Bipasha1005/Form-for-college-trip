<?php
$insert = false;
if (isset($_POST['name'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Creat database Conection 
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success 
    if (!$con) {
        die("Conection to this server fail due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    
    //collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other.', current_timestamp());";
    //echo $sql;

    //execute the query
    if ($con->query($sql) == true) {
        //echo "Successfully inserted";

        //flag for successfull insertion
        $insert = true;
    }
    else{
        echo "Error : $sql <br> $con->error";
    }

    //Close the database connection
    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="JISCE">
    <div class="container">
        <h1>Welcome to JIS</h1>
        <p>Enter your details</p>
        <?php
        if($insert == true){     
        echo "<p class='submitMSG'>Thanks For Submitting your Form. We are happy to see you joining with us to thge trip</p>";
        }
        ?>   
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter Any info here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>

    </div>
    <script src="script.js"></script>
    
</body>

</html>