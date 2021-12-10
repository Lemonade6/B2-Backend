<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Astronaut</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper">
		<div class="card">
			<div class="card-header">
				<!--creating an a tag to return back to index.php-->
				<a href="index.php" style="color: #fff;text-decoration: none; float: right;padding-right: 20px;">Go to Main Page</a>
				<h1>View Set Targets</h1>
				<!-- creating a form with Post method to be able to use the inputted data in our php-->
				<form action="" method="post" class="search_form">
					<!--creating an input tag to be able to get the users input-->
					<input type="text" name="Target_ID" class="search_field">
					<input type="submit" name="search_targets" class="search_btn" value="search">
					<!--creating breaks -->
					<br>
					<br>
					<!--creating a label to display the function of thr button-->
					<label for="" size="10x" color>View whole table</label>
					<input type="submit" name="target_tbl" class="search_btn">
					<!--closing form tag-->
				</form>
			</div>
				<div class="card-body">
					<div class="table">
						<!--creating a table tag so that the data displayed from our code is in a table form-->
						<table border="1" width="100%">

							
							
							
							
							<!--creating PHP tag-->
							<?php
							// config file for database connection 
							include ("config.php");
                            //using the isset function to determine if the input tag name 'search_targets has been clicked if true then it will run whats inside the function, 
	                        // if false then the 'else function' shall run 
							if(isset($_POST['search_targets'])){
								//creating a variable name target_id equal to the global variable post(target_id),
								$target_id=$_POST['Target_ID'];
                                //creating the query, select all from the table targets where the target_id field equals to the variable target_id which is set above.
								$qry="select * from targets where Target_ID= '$target_id'";
								// to run query 
                                //setting run = to mysqli_query function which runs the query on the database 
								$run=mysqli_query($con, $qry);
                                // checking the required data is available or not from the query
								//if number of rows in the query is greater then zero...
								if (mysqli_num_rows($run) > 0 ) {
									// displaying a row with a <tr> tag with Name, first mission, type and number of missions
									echo "<tr><th>Name</th><th>First Mission</th><th>Type</th><th>Number of Missions</th></tr>";
                                    // fetching the data with a while loop statement, with an fetch array function, looping through the query from $run
									while($data=mysqli_fetch_array($run)){
										$name=$data['Name'];
                                        $first_mission=$data['First_mission'];
                                        $type=$data['type'];
										$No_missions=$data['No_mission'];
										// displaying the fields name and number of missions from the astrounaut table from the query that was run
										echo "</tr><tr><td align='center'>$name</td> <td align='center'>$first_mission</td><td align='center'>$type</td><td align='center'>$No_mission</td>";

									}
								}
								// if the id entered doesnt run the query then display no data to display
								else{
									echo "<h3 align='center' style='padding:30px 0; color:red;'>No Data to Display :(</h3>";
								}
								
							}
							// below is the code to display the whole astronaut table

							//creating an if statement and using the isset function to see if target_table button has been clicked.
							if(isset($_POST['target_tbl'])){
								//creating a qry to display all data within the astronaut table
							$qry1="select * from targets";
							      // to run query 
                                  //setting run = to mysqli_query function which runs the query on the database 
                                    $run=mysqli_query($con, $qry1);
                                     // displaying a row with a <tr> tag with Name, first mission, type and number of missions
									echo "<tr><th>Name</th><th>First Mission</th><th>Type</th><th>Number of Missions</th></tr>";
									// fetching the data with a while loop statement, with an fetch array function, looping through the query from $run variable 
                                    while($data=mysqli_fetch_array($run)){
                                    	$name=$data['Name'];
                                        $first_mission=$data['First_mission'];
                                        $type=$data['type'];
										$No_missions=$data['No_mission'];
										// displaying the fields name and number of missions from the targets table from the query that was run, also using the echo function to display.
                                    	echo "</tr><tr><td align='center'>$name</td> <td align='center'>$first_mission</td><td align='center'>$type</td><td align='center'>$No_missions</td>";
                                    }
								}
							//closing php tag
							?>
							
						<!--closing table tag-->
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>

</html>