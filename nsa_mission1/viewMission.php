<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View mission</title>
	<!--styles link-->
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper">
		<div class="card">
			<div class="card-header">
				<!-- link for main home page -->
				<a href="index.php" style="color: #fff;text-decoration: none; float: right;padding-right: 20px;">Go to Main Page</a>
				<h1>Missions</h1>
				<!--creating a form tag for our form inputs-->
				<form action="" method="post" class="search_form">
					<!--creating an input tag with the name mission_id and class search field-->
					<input type="text" name="mission_id" class="search_field">
					<!--input tag with the type submit and name search mission, to initiate search of table with ID entered into the able input tag search field.-->
					<input type="submit" name="search_mission" class="search_btn" value="search">
					<br>
					<br>
					<!--creating a label to display the function of thr button-->
					<label for="">View whole table</label>
					<input type="submit" name="mission_tbl" class="search_btn">
					<!--form closing tag-->
				</form>
			</div>
			<div class="card-body">
				<div class="table">
					<table border="1" width="100%">

						
						
						
						
						<!--creating PHP tag-->
						<?php
					    // config file for database connection
						include ("config.php");
                        //using the isset function to determine if the input tag name 'search_mission' has been clicked if true then it will run whats inside the function, 
	                    // if false then the 'else function' shall run 
						if(isset($_POST['search_mission'])){
							//creating a variable name mission_id equal to the global variable post(mission_id),
							$mission_id=$_POST['mission_id'];
							//creating the query, select all from the table mission where the mission_id field equals to the variable mission_id input which was declared above.
							$qry="select * from mission where mission_id= '$mission_id'";
							// to run query 
                            //setting run = to mysqli_query function which runs the query on the database 
							$run=mysqli_query($con, $qry);
                            // checking the required data is available or not from the query
							//if number of rows in the query is greater then zero...
							if (mysqli_num_rows($run) > 0 ) {
								// displaying a row with a <tr> tag with destination row, Launch date row, mission type row, crew size row, target id row.
								echo "<tr><th>Destination</th><th>Lanuch Date</th><th>Mission Type</th><th>Crew Size</th><th>Target ID</th></tr>";
                                //fetching the data with a while loop statement, with an fetch array function, looping through the query from $run
								while($data=mysqli_fetch_array($run)){
									$destination=$data['Destination'];
									$launch_date=$data['Launch_date'];
									$type=$data['type'];
									$crew_size=$data['Crew_size'];
									$target_id=$data['Target_ID'];
                                    // printing the data in table form 
									echo "</tr><tr><td align='center'>$destination</td> <td align='center'>$launch_date</td><td align='center'>$type</td><td align='center'>$crew_size</td><td align='center'>$target_id</td></tr>";

								}
							}
							// if the IF statement is false then run else function
							else{
								//display, No data to display
								echo "<h3 align='center' style='padding:30px 0; color:red;'>No Data to Display :(</h3>";
							}
							
						}
						// below is the code to display the whole astronaut table

							//creating an if statement and using the isset function to see if astrounaut_table button has been clicked.
							if(isset($_POST['mission_tbl'])){
								//creating a qry to display all data within the mission table
							$qry1="select * from mission";
							    // displaying a row with a <tr> tag with Name and number of missions
							    echo "<tr><th>Destination</th><th>Lanuch Date</th><th>Mission Type</th><th>Crew Size</th><th>Target ID</th></tr>";
							      // to run query 
                                  //setting run = to mysqli_query function which runs the query on the database
                                    $run=mysqli_query($con, $qry1);
									// fetching the data with a while loop statement, with an fetch array function, looping through the query from $run variable and the connection variable
                                    while($data=mysqli_fetch_array($run)){
                                    	$destination=$data['Destination'];
                                    	$launch_date=$data['Launch_date'];
                                    	$type=$data['type'];
                                    	$crew_size=$data['Crew_size'];
                                    	$target_id=$data['Target_ID'];
										// displaying the fields from the mission table, using the variables assigned to them above. also using the echo function
                                    	echo "<tr><td align='center'>$destination</td> <td align='center'>$launch_date</td><td align='center'>$type</td><td align='center'>$crew_size</td><td align='center'>$target_id</td></tr>";

                                    }
								}
						//closing PHP tag
						?>
						
						
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>