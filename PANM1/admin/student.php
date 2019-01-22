<!--done all the links-->
<?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:admin_login.php?msg=AUTHENTICATION REQUIRED");
}
?>

<?php 
      include('C:\xampp\htdocs\PANM1\header.php'); ?>
      <section class="container-fluid header-section link-shadowed" style="margin-top:80px;margin-bottom:220px;">
        <!-- for background img-->
        <h3 style="display:inline-block;float:left;"><a href="index.php"><= Back</a></h3>
        <h3 style="float:right;"><a href="s/insert_student.php">Add student</a>&emsp;<?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>_Id: <?php echo $_SESSION['faculty']; ?>&emsp;Name: <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="admin_logout.php">Logout</a></h3>
        <br><br><br><br>
        <h4 class="msg"><?php if(isset($_GET['msg']))
        {
            echo $_GET['msg'];
        }
            ?></h4>
        <br><br>
            <table class="table table-dark table-sm table-hover" align="center" style="font-size:18px;font-weight:500;background-color:rgba(255,255,255,0.3);">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">CPI</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Update details</th>       
                    <th scope="col">Delete</th>
                    
                </tr></thead><tbody>
                <?php
                $count=0;
                    try{
                        $dbhandler=new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql='select * from students where participate=1';
                        
                        $query=$dbhandler->query($sql);                 //   there is some problem here
                        
                        while($r=$query->fetch())//want to see examine the logic in detail
                        {        
                                  echo '<tr>'
                                . '<td>'.$r['student_id'].'</td>'
                                . '<td>'.$r['first_name'].' '.$r['last_name'].'</td>'
                                . '<td>'.$r['birthdate'].'</td>'
                                . '<td>'.$r['cpi'].'</td>'
                                . '<td>'.$r['email'].'</td>'
                                . '<td>'.$r['contact_no'].'</td>'
                                . '<td><a href="s/update_student.php?id='.$r['student_id'].'">Update</a></td>'
                                . '<td><a href="s/delete_student_sql.php?id='.$r['student_id'].'">Delete</a></td>'
                                
                                        .'</tr>';
                            $count++;
                        }
                        
                    } catch (Exception $ex) {
                        echo 'hello! There is some error!';
                    }
                
                echo '<tr>
                <td colspan="8" align="center">Total : '.$count.'</td>
                </tr>';
                ?>
            </tbody></table>
            <br>
                <h4 align="center" style="color:red;">
                    <b>THIS ARE ONLY PARTICIPATED STUDENTS</b></td>
                </h4><br><br>
                <h4 align="left"><i>For non participated student  : <a href="s/non_participated_student.php">Click here</a></i></h4>
    </section>
<?php include 'C:\xampp\htdocs\PANM1\footer.php';?>