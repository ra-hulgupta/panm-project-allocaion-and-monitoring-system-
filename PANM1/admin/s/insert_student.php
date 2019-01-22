<!--inserting properly wih valid data-->
<?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:../admin_login.php?msg=AUTHENTICATION REQUIRED");
}
    //  display the form for inserting the student
    //   send data to insert_student_sql.php by POST method
?>

<?php 
      include('C:\xampp\htdocs\PANM1\header.php'); ?>
      <section class="container-fluid header-section link-shadowed" style="margin-top:80px;margin-bottom:220px;">
        <!-- for background img-->
        <h3 style="display:inline-block;float:left;"><a href="../student.php"><= Back</a></h3>
        <h3 style="float:right"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>_Id: <?php echo $_SESSION['faculty']; ?>&emsp;Name: <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="../admin_logout.php">Logout</a></h3><br><br><br>        
        <form action="insert_student_sql.php" onsubmit="return Validate()" method="post"><!--the return validate function needs to be defined-->
            <h3 class="msg">
                <?php
                if(isset($_GET['msg']))
                {
                    echo $_GET['msg'];
                }
                ?>
            </h3>
            <br>
            <table class="table table-sm table-borderless" style="width:70%;text-align:center;font-size:18px;font-weight:500;" align="center">
                <thead><tr>
                    <th scope="col" align="center" colspan="2">New Student</th>
                </tr></thead><tbody>
                <tr>
                    <td>* Student Id</td>
                    <td><input type="text" id="id" class="textbox" name="s_id" required></td>
                </tr>
                <tr>
                    <td>* Birth Date</td>
                    <td><input type="date" id="date" class="textbox" name="s_birthday" required></td>     <!--   uses birthdate as password initially   -->
                </tr>
                <tr>
                    <td>* CPI</td>
                    <td><input type="text" id="cpi" class="textbox" name="s_cpi" required></td>
                </tr>
                <tr>
                    <td>* First Name</td>
                    <td><input type="text" id="name1" class="textbox" name="s_f_name" required></td>
                </tr>
                <tr>
                    <td>* Last Name</td>
                    <td><input type="text" id="name2" class="textbox" name="s_l_name" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" id="email" class="textbox" name="s_email"></td>
                </tr>
                <tr>
                    <td>Contact no.</td>
                    <td><input type="text" id="no" class="textbox" name="s_contact"></td>
                </tr>
                <tr>
                    <td>Student can participate...</td>
                    <td><input type="checkbox" name="s_participate" checked></td>
                </tr>
                <tr>
                    <td colspan="2">&emsp;&emsp;<input type="submit" class="button shadow" value="ADD STUDENT">&emsp;&emsp;&emsp;
                    <input type="reset" class="button shadow" value="Reset"></td>
                </tr>
                </tbody>
                </table>
        </form>
        <br><br>
            <h3 style="position:relative;display:inline-block;float:left;color:red;margin-left:15%;"><i>&nbsp;&nbsp;&nbsp;Notes :&nbsp;&nbsp;&nbsp;</i></h3>
            <h4 style="position:absolute;display:inline-block;color:dodgerblue;background-color:rgba(255,255,255,0.7);">Student id must be between 1 to 6 digit
            <br>
            We consider birthdate as student's initial password later can be changed
            <br>
            password in this formate  :  yyyy-mm-dd
            <br>
            *  Required Details
        </h4>
</section>
<?php include 'C:\xampp\htdocs\PANM1\footer.php';?>