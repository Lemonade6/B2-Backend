<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Attendance</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper">
		<div class="card">
            <!--creating an a tag to return back to index.php-->
				<a href="index.php" style="color: #fff;text-decoration: none; float: right;padding-right: 20px;">Go to Main Page</a>
			<div class="card-header"><h1>Attendance Table</h1></div>
			<div class="card-body">
				<div class="table">
                    <!-- using a table tag so that whats in the tag displays as a table -->
					<table border="1" width="100%">

                        <!--using a tr tag to define our rows -->
						<tr>
                        <!--using a th tag to define our header within the table-->
						<th>Mission ID</th>
						<th>Astronauts ID</th>
                        <!--closing tr tag-->
						</tr>
					
					
						
					<?php
                        // including the config.php file for the db connection
                        include ("config.php");
                        //creating a qry to display all data within the attends table
                        $qry="select * from attends";
                         // to run query 
                         //setting run = to mysqli_query function which runs the query on the database
                         $run=mysqli_query($con, $qry);
                         // creating a while loop, with a data variable equal to the function mysqli_fetch_array 
                         // with the run variable delcared above in the functions parameters. the mysqli pulls the rows
                         // from the query running within the run variable. as the while loop keeps looping through the 
                         // function until it returns false
                         while($data=mysqli_fetch_array($run)){
                         //creating variables and setting them to fields within the database so that we can then display with the echo function.
                          $mission_id=$data['Mission_ID'];
                          $astronauts_id=$data['astronaut_ID'];
                          // displaying the fields from the attends table, using the variables assigned to them above. also using the echo function.
                             echo "<tr><td align='center'>$mission_id</td> <td align='center'>$astronauts_id</td></tr>";

                           }// closing PHP tag
					?>
						
					
				</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>