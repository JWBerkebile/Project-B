<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Select Parts</title>
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
        <h1 class="display-3">Part Number Search</h1>
        <p class="lead">Track and edit parts from virtually anywhere!</p>
        <a href="XtraLifeLogin.html" class="btn btn-primary btn-lg">Logout</a>
        <a href="XtraLifeTechHome.html" class="btn btn-primary btn-lg">Back</a>
      </header>

<?php

ini_set('display_errors', 1);

$numSearch = htmlspecialchars($_POST['numSearch']);

//Database connection
require_once("databaseConnect.php");

$sql = "SELECT id, partName, partNumber, manufacturer, machineName, cost, Quantity, cost * Quantity as Total FROM content WHERE partNumber LIKE '%$numSearch%'";  //Select everything from content table matching entered part number

if($result = mysqli_query($conn, $sql)) {

    if(mysqli_num_rows($result) > 0)  {

        echo "<table style='width:100%; background-color:#d1d1e0'>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Part Name</th>";
                echo "<th>Part Number</th>";
                echo "<th>Manufacturer</th>";
                echo "<th>Machine Name</th>";
                echo "<th>Cost</th>";
                echo "<th>Quantity</th>";
                echo "<th>Total</th>";                                  
                echo "<th>Remove</th>";
            echo "</tr>";

            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                    echo "<td>" .  $row['id'] . "</td>"; 
                    echo "<td>" .  $row['partName'] . "</td>"; 
                    echo "<td>" .  $row['partNumber'] . "</td>";  
                    echo "<td>" .  $row['manufacturer'] . "</td>"; 
                    echo "<td>" .  $row['machineName'] . "</td>";
                    echo "<td>" .  $row['cost'] . "</td>";
                    echo "<td>" .  $row['Quantity'] . "</td>";
                    echo "<td>" .  $row['Total'] . "</td>";  
                    echo "<td>" . "<a href=" . "removeInventory.php?page=" . $row['id'] . ">" .  "Remove 1 From Inventory" . "</a>" . "</td>"; 
                echo "</tr>";

                }

        echo "</table>";

                mysqli_free_result($result);

    }

    else {
        echo "<font size = '20' face = 'Arial'>"; 
        echo "No records matching your search.";
    }


}


else { 

    echo "ERROR: Could not execute $sql." . mysqli_error($conn);

}

mysqli_close($conn);                        //Disconnects from database (closes the connection)

?>

</html>
