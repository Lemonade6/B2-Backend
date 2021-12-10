<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Creating a link tag for our styling-->
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="wrapper">
		<div class="card">

			<div class="card-header">
				<!-- link for main home page -->
				<a href="index.php" style="color: #fff;text-decoration: none; float: right;padding-right: 20px;">Go to Main Page</a>
				<h1>Add Mission</h1></div>
				<div class="card-body">
					<div class="form">
						<form action="" method="POST">
							<h3>Destination</h3>
							<!--creating input tags for the inputs for our database fields, the input have the attribute required, to ensure that the field has data inputted.-->
							<input type="text" name="Destination" class="form-control" required >
							<h3>Launch Date</h3>
							<!--creating input tags for the inputs for our database fields, the input have the attribute required, to ensure that the field has data inputted.-->
							<input type="date" name="Launch-date" class="form-control" required >
							<h3>Type</h3>
							<!--creating input tags for the inputs for our database fields, the input have the attribute required, to ensure that the field has data inputted.-->
							<input type="text" name="type" class="form-control" required>
							<h3>Crew Size</h3>
							<!--creating input tags for the inputs for our database fields, the input have the attribute required, to ensure that the field has data inputted.-->
							<input type="number" name="Crew-size" class="form-control" required>
							<h3>Target ID</h3>
							<!--creating input tags for the inputs for our database fields, the input have the attribute required, to ensure that the field has data inputted.-->
							<input type="number" name="Target-ID" class="form-control" required>
							<!-- creating an input tag with type submit, this is to initiatle the code submission then sent to our php to handle the data-->
							<input type="submit" name="save_mission" class="astronaut_btn">
						</form>

						
					</div>
				</div>

			</div>
		</div>
	</body>
	</html>
	<!--Opening PHP tag-->
	<?php
	// form validation file to validate the inputted data
	include("validation.php");
	// including the config.php file for the db connection
	include("config.php");
	// using the isset function to determine if each field within the form has been filled if true then it will run whats inside function, 
	// if false then the 'else function' shall run
	if(isset($_POST['save_mission'])){
		//checking each field by the post variable
		$destination=$_POST['Destination'];
		$launch_date=$_POST['Launch-date'];
		$missionType=$_POST['type'];
		$crew_size=$_POST['Crew-size'];
		$target_id=$_POST['Target-ID'];
		//insert query for data insertion in mission table                                          /the values set from the POST method above, with the values from our form.
		$qry="INSERT INTO `mission`(`Destination`, `Launch_date`, `type`, `Crew_size`, `Target_ID`) VALUES ('$destination',$launch_date,'$missionType','$crew_size','$target_id')";
		// to run query 
        //setting run = to mysqli_query function which runs the query on the database 
		$run=mysqli_query($con,$qry);
		//creating an IF statement to check if our run on the query was succesful
		//if $run is equal to true then run this
		if($run==true){
			// creating a variable last_id to display with our alert that the query was successfully ran and displaying the ID created
			// Using the insert_id function, which returns the ID created with auto increment from the last query. 
			$last_id = $con->insert_id;
			// displaying an alert notifying successful query, with last_id variable to display their ID
			echo "<script>alert('Mission Added Successfully. Mission No is $last_id')</script>";
		}
		//IF run was false then
		else{
			//display alert with an error message to retry
			echo "<script>alert('oops! Some Error, Try Again!!!!')</script>";
		}
	}
	//PHP closing tag
	?>
