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
        <h1 class="display-3">Remove Parts</h1>
        <p class="lead">Track and edit parts from virtually anywhere!</p>
        <a href="XtraLifeLogin.html" class="btn btn-primary btn-lg">Logout</a>
        <a href="XtraLifeTechHome.html" class="btn btn-primary btn-lg">Back</a>
      </header>



<?php

$id = htmlspecialchars($_POST['content_id']);         //This is the primary key in the content db table to perform the UPDATE

require_once("databaseConnect.php");


$id = htmlspecialchars($_GET['page']);                      //Get the user id to update from the database from the prior screen GET method


//sql to remove part from inventory

$sql = "UPDATE content SET Quantity = Quantity - 1 WHERE content.id = $id";

if(mysqli_query($conn, $sql)) {
    echo "<font size = '20' face = 'Arial'>";
    echo "</br>";
    echo "Item removed successfully!";
}

else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>

<div style="display: flex; justify-content: center;">
    
        <img src="Images/KenVictory.jpg" height="400" width="400"> 
        <img src="Images/RyuCrossArms.jpg" height="200" width="100"> 

    </div>

</html>
