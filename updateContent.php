<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Update Parts</title>
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
        <p class="lead">Track and edit parts from virtually anywhere!</p>
        <a href="XtraLifeLogin.html" class="btn btn-primary btn-lg">Logout</a>
        <a href="selectPartsToModify.php" class="btn btn-primary btn-lg">Back</a>

      </header>
    </div>
	<?php

//Connect to database

	require_once("databaseConnect.php");

//Setup our variable for out query string - GET method

	$page = htmlspecialchars($_GET['page']);       			//Get the page variable from the browser URL string - put in local variable

	$sql = "SELECT * from content where id='$page'";        

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {          			//If we did find record(s) then display that info


		while($row = mysqli_fetch_assoc($result)) {


//Create my local variables

			$partName = $row["partName"];
			$partNumber = $row["partNumber"];
			$manufacturer = $row["manufacturer"];
			$machineName = $row["machineName"];
			$cost = $row["cost"];
			$Quantity = $row["Quantity"];


		}

	}



	else {
		echo "0 Results";
	}


	mysqli_close($conn);


	?> 


<!--head title with icon -->
<head>
	<meta charset="utf-8">
	<title>Update Content</title>
	<link rel="shortcut icon" href="MBison.jpg" >
		



<body>
	<form name="myForm" method="post" action="updatedContentToDB.php"> <br/>


        <input type="hidden" name="content_id" id="content_id" value="<?php echo $page;?>">
			<center>
				<p style="font-size: 20px; font-weight: bold">Enter Part Name &nbsp; &nbsp; &nbsp; &nbsp; 
				<input type="text" name="partName" id="partName" value="<?php echo $partName;?>"> 
				</p>
				<br/>
				<p style="font-size: 20px; font-weight: bold">Enter Part Number &nbsp; &nbsp;
				<input type="text" name="partNumber" id="partNumber" value="<?php echo $partNumber;?>"> 
				</p>
				<br/>
				<p style="font-size: 20px; font-weight: bold">Enter Manufacturer &nbsp; &nbsp;
				<input type="text" name="manufacturer" id="manufacturer" value="<?php echo $manufacturer;?>">
				</p>
				<br/>
				<p style="font-size: 20px; font-weight: bold">Enter Machine Name &nbsp;
				<input type="text" name="machineName" id="machineName" value="<?php echo $machineName;?>">
                </p>
                <br/>
                <p style="font-size: 20px; font-weight: bold">Enter Cost &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<input type="text" name="cost" id="cost" value="<?php echo $cost;?>">
				</p>
				<br/>
				<p style="font-size: 20px; font-weight: bold">Enter Quantity &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<input type="text" name="Quantity" id="Quantity" value="<?php echo $Quantity;?>">
				</p>
				<br/>
			</center>

				<p>
		<!-- Centered the submit button for visual effect -->
        <div style="display: flex; justify-content: center;">

          <a  class="btn btn-primary btn-lg"><input style="font-size: 20px": type="submit" value="Submit"></a>  
                
        </div>
				</p>
	</form>

</body>

</html>