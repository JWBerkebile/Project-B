<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Insert Parts</title>
  <link rel="shortcut icon" href="Images/MBison.jpg">


  <!-- Bootstrap core CSS -->
  <link href="Styles/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="Styles/features.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <nav id="optionalnav" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand">X-Tra Life Parts Tracking</a>
        <div class="logo-image">
            <img src="Images/Arcade01.jpg" class="img-fluid">
        </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h1 class="display-3">X-Tra Life Parts Tracking</h1>
        <h1 class="display-3">Add Parts</h1>
        <p class="lead">Track and edit parts from virtually anywhere!</p>
        <a href="XtraLifeLogin.html" class="btn btn-primary btn-lg">Logout</a>
        <a href="AddParts.html" class="btn btn-primary btn-lg">Back</a>
      </header>


<?php

ini_set('display_errors', 1);

$partName = htmlspecialchars($_POST['partName']);     
$partNumber = htmlspecialchars($_POST['partNumber']);
$manufacturer = htmlspecialchars($_POST['manufacturer']);
$machineName = htmlspecialchars($_POST['machineName']);
$cost = htmlspecialchars($_POST['cost']);
$Quantity = htmlspecialchars($_POST['Quantity']);

//Connecting to database
require_once("databaseConnect.php");

//SQL Command Reference
//INSERT INTO `content` (`partName`, `partNumber`, `manufacturer`, `machineName`, `cost`) VALUES (NULL, 'Test', 'Test', 'Test', 'Test', 'Test');

//SQL Command
$sql = "INSERT INTO content(partName,partNumber,manufacturer,machineName,cost,Quantity) VALUES ('$partName', '$partNumber', '$manufacturer', '$machineName', '$cost', '$Quantity')";

//Adjusting to larger font size for visual confirmation
if(mysqli_query($conn, $sql))   {
	echo "<font size = '20' face = 'Arial'>"; 
	echo "</br>";
    echo "New record created successfully!";
}

//Error Handler
else {
        echo "<font size = '18' face = 'Arial'>";
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }

//Close the database connection

    $conn->close();

?>

<div style="display: flex; justify-content: center;">
    
        <img src="Images/KenVictory.jpg" height="400" width="400"> 
        <img src="Images/RyuCrossArms.jpg" height="200" width="100"> 
</div>    

</html>