<?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:../admin_login.php?msg=AUTHENTICATION REQUIRED");
}
?>

<?php 
      include('C:\xampp\htdocs\PANM1\header.php'); ?>
      <section class="container-fluid header-section link-shadowed" style="margin-top:80px;margin-bottom:220px;">
        <!-- for background img-->
        <h3 style="display:inline-block;float:left;"><a href="../student.php"><= Back</a></h3>
        <h3 style="float:right"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>_Id :<?php echo $_SESSION['faculty']; ?>&emsp;Name :<?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="../admin_logout.php">Logout</a></h3> <br>
        <h3 class="msg"><?php if(isset($_GET['msg']))
        {
            echo $_GET['msg'];
        }
            ?></h3>
        <br><br><br><br>
            <table class="table table-sm table-hover" align="center" style="width:65%;text-align:center;font-size:18px;font-weight:500;background-color:rgba(255,255,255,0.3);">
                <thead class="thead-dark"><tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">CPI</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Update student's details</th>
                    <th scope="col">Delete</th>
                    
                </tr></thead><tbody>
                <?php
                $count=0;
                    try{
                        $dbhandler=new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql='select * from students where participate=0';
                        
                        $query=$dbhandler->query($sql);                 //   there is some problem here
                        
                        while($r=$query->fetch())                   //need to study the working of this while loop
                        {
                     
                                echo '<tr>'
                                . '<td>'.$r['student_id'].'</td>'
                                . '<td>'.$r['first_name'].' '.$r['last_name'].'</td>'
                                . '<td>'.$r['birthdate'].'</td>'
                                . '<td>'.$r['cpi'].'</td>'
                                . '<td>'.$r['email'].'</td>'
                                . '<td>'.$r['contact_no'].'</td>'
                                . '<td><a href="update_student.php?id='.$r['student_id'].'">Update</a></td>'
                                . '<td><a href="delete_student_sql.php?id='.$r['student_id'].'">Delete</a></td>'
                                        .'</tr>';
                               $count++;
                        }
                        
                    } catch (Exception $ex) {
                        echo 'hello! There is some error!';
                    }
                    
                    echo '<tr>
                    <td colspan="8">Total : '.$count.'</td>
                </tr>';
                     ?></tbody>
            </table>
            <h4 align="center" style="color:red;"><b>NON PARTICIPATED STUDENTS</b></h4>                
</section>
<?php include 'C:\xampp\htdocs\PANM1\footer.php';?>