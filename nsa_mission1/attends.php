<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Attendance</title>
	<!-- Creating a link tag for our styling-->
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper">
		<div class="card">

			<div class="card-header">
				<!-- link for main home page -->
				<a href="index.php" style="color: #fff;text-decoration: none; float: right;padding-right: 20px;">Go to Main Page</a>
				<h1>Add Attendance</h1></div>
				<div class="card-body">
					<div class="form">
						<form action="" method="POST">
							<label for="">mission_id</label>
							<!--creating input tags for the inputs for our database fields, the input have the attribute required, to ensure that the field has data inputted.-->
							<input type="text" name="mission_id" class="form-control" required>
							<label for="">Astronaut_id</label>
							<!--creating input tags for the inputs for our database fields, the input have the attribute required, to ensure that the field has data inputted.-->
							<input type="text" name="astronaut_id" class="form-control" required>
							<!-- creating an input tag with type submit, this is to initiatle the code submission then sent to our php to handle the data-->
							<input type="submit" name="save_attends" class="astronaut_btn" >
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
	if(isset($_POST['save_attends'])){
		//checking each field by the post variable
		$mission_id=$_POST['mission_id'];
		$astronaut_id=$_POST['astronaut_id'];
		//insert query for data insertion in attends table                                          /the values set from the POST method above, with the values from our form.
		$qry="INSERT INTO `attends`(`Mission_ID`, `astronaut_ID`) VALUES ('$mission_id','$astronaut_id')";
		// to run query 
        //setting run = to mysqli_query function which runs the query on the database 
		$run=mysqli_query($con,$qry);
		//creating an IF statement to check if our run on the query was succesful
		//if $run is equal to true then run this
		if($run==true){
			// displaying an alert notifying successful query.
			echo "<script>alert('Attendance Added Successfully.')</script>";
		}
		//IF run was false then
		else{
			//display alert with an error message to retry
			echo "<script>alert('oops! Some Error, Try Again!!!!')</script>";
		}
	}
	//PHP closing tag
	?>
