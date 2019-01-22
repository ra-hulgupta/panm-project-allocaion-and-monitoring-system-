<!--everything is fine --><?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:admin_login.php?msg=AUTHENTICATION REQUIRED");
}
?>


<!--         display all the stuff    -->
<?php 
      include('C:\xampp\htdocs\PANM1\header.php'); ?>
      <section class="container-fluid header-section link-shadowed" style="margin-top:80px;margin-bottom:110px;">
        <!-- for background img-->
        <h3 style="float:right;"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>_Id: <?php echo $_SESSION['faculty']; ?>&emsp;Name: <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="admin_logout.php">Logout</a>
        </h3>
        <br>
        
        <br>
        <h3 class="msg">
                        <?php 
                            if(isset($_GET['msg']))
                                echo $_GET['msg'];
                        ?>
        </h3>
        <br>
        <h5 align="center" style="font-weight:400;
                                  font-size:20px;">
        <a href="student.php">Student Details</a>
        <br><br>
        <a href="project.php">Project Details</a>
		<br><br>
		<a href="allocate.php">Allocate projects</a> 
        <br><br>
		<a href="assign.php">Assign work</a> 
        <br><br>
		<a href="assign5.php">Check Work</a>
        
        <br><br>
        <?php
        
        if(isset($_SESSION['admin']))
        {
            echo '<a href="faculty.php">Faculty Details</a><br><br><a href="allocation/allocation_process.php">Allocation Process</a>';
        }
        ?>
        <br>
        <br>
        <br>
        <a style="color:red;" href="../change_pass/change_password.php">Change Password</a></h5>
</section>
<?php include 'C:\xampp\htdocs\PANM1\footer.php';?>