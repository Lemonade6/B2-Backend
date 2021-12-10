<?php  
// creating a function with functions that perform validation of the data inputted into the database.
function test_input($data) {
  // using the trim function to trim the data
  $data = trim($data);
  // strip lashes from data inputted
  $data = stripslashes($data);
  // using htmlspecialchars to remove charaters and cross scripting, this is included as a security feature
  $data = htmlspecialchars($data);
  //creating the function 
  return $data;
}

?>  