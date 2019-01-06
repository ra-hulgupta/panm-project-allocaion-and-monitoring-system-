<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "project_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$leaderid = mysqli_real_escape_string($link, $_REQUEST['Leaderid']);
$work = mysqli_real_escape_string($link, $_REQUEST['Work']);
 
// attempt insert query execution
$sql = "INSERT INTO assign (Leaderid, Work) VALUES ('$leaderid', '$work')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>