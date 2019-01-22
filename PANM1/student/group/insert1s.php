<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "project_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$workno = mysqli_real_escape_string($link, $_REQUEST['Work_no']);
$description = mysqli_real_escape_string($link, $_REQUEST['Description']);
 
// attempt insert query execution
//$sql = "UPDATE assign SET Description=$description WHERE Work_NO=$workno";
$sql="update assign SET Description='$description' where Work_No=$workno";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>