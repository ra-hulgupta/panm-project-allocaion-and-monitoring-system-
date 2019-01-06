<?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:admin_login.php?msg=AUTHENTICATION REQUIRED");
}
?>


<!--         display all the stuff    -->

<html>
    <head>
        <title>Project Allocation</title>
        <link rel='icon' href="../favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Robot" content="index,follow,project,allocation,distribution,subject"/>
        <meta name="Description" content="Online Project Allocation is available over here"/>
        <link rel="stylesheet" type="text/css" href="../main.css">
    </head>
    <body>
        <h1 align="center">Project Allocation</h1>
        <br>
        <h3 align="right"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>   &emsp;    Id: <?php echo $_SESSION['faculty']; ?>  &emsp;       Name : <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="admin_logout.php" class="log_out shadow">Logout</a>&emsp;</h3>
        <br>
 <form action="inserts.php" method="post">
	<p>
    	<label for="firstName">Leaderid:</label>
        <input type="text" name="Leaderid" id="Leaderid">
    </p>
    <p>
    	<label for="lastName">Work:</label>
        <input type="text" name="Work" id="Work">
    </p>
    <input type="submit" value="Add Records">
</form>
    </body>
</html>