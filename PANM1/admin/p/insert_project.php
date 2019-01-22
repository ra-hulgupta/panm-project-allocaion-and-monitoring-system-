<!--inserting perfectly-->
<?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:../admin_login.php?msg=AUTHENTICATION REQUIRED");
}


    //  display the form for inserting the project
    //   send data to insert_project_sql.php by POST method
?>


<?php 
      include('C:\xampp\htdocs\PANM1\header.php'); ?>
      <section class="container-fluid header-section link-shadowed" style="margin-top:80px;margin-bottom:220px;">
        <!-- for background img-->
        <h1 align="center">Project Insertion</h1>
        <h3 style="display:inline-block;float:left;"><a href="../project.php"><= Back</a></h3>
        <h3 style="float:right;"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>_Id: <?php echo $_SESSION['faculty']; ?>&emsp;Name: <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="../admin_logout.php">Logout</a></h3><br><br>
        <h3 class="msg">
                <?php
                if(isset($_GET['msg']))
                {
                    echo "<br>".$_GET['msg']."<br><br>";
                }
                ?>
            </h3><br><br>
                   
        <form action="insert_project_sql.php" onsubmit="return Validate()" method="post">
            <table class="table table-dark table-sm" align="center" style="text-align:center;font-size:18px;font-weight:500;background-color:rgba(255,255,255,0.3);width:70%;">
                <thead>
                <tr>
                    <th scope="col" colspan="2">New Project</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Project Id</td>
                    <td><input type="text" id="id" class="textbox" name="p_id" required></td>
                </tr>
                <tr>
                    <td>Definition</td>
                    <td><input type="text" id="definition" class="textbox" name="p_definition" required></td>  
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea rows="3" id="description" cols="30" class="textbox" name="p_description" ></textarea></td>
                </tr>
                
                <tr>
                    <td>Project Enable</td>
                    <td><input type="checkbox" name="p_enable" checked></td>
                </tr>
                <tr>
                    <td colspan="2">&emsp;&emsp;<input type="submit" value="ADD PROJECT">&emsp;&emsp;&emsp;
                    <input type="reset" value="Reset"></td>
                </tr></tbody>
            </table>
        </form><br><br>
            <h3 style="position:relative;display:inline-block;float:left;color:red;margin-left:20%;"><i>Notes :&nbsp;&nbsp;&nbsp;</i></h3>
            <h4 style="position:absolute;display:inline-block;color:dodgerblue;width:40%;background-color:rgba(255,255,255,0.7);">Project id must be between 1 to 6 digit
            <br>
            definition means the *Title* of your project
            <br>
            and 40 to 50 length description
            <br>
            *  Required Details
        </h4>
</section>
<script type="text/javascript" src="validate.js"></script>
<?php include 'C:\xampp\htdocs\PANM1\footer.php';?>
