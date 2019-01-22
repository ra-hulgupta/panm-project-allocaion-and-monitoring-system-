<!--All the things perfect-->
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
        <h4 style="display:inline-block;float:left;"><a href="../project.php"><= Back</a></h4>
        <h4 style="float:right;"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>_Id: <?php echo $_SESSION['faculty']; ?>&emsp;Name: <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="../admin_logout.php">Logout</a></h4><br><br>
        <h4 class="msg"><?php if(isset($_GET['msg']))
        {
            echo "".$_GET['msg']."<br><br>";
        }
            ?>
        </h4>
        <br><br>
        <table class="table table-dark table-hover" align="center" style="font-size:19px;font-weight:400;background-color:rgba(255,255,255,0.3);">
            <thead>
                <tr>
                    <th scope="col">Project Id</th>
                    <th scope="col">Definition</th>
                    <th scope="col">Description</th>
                    <th scope="col">Update project details</th>        
                    <th scope="col">Enable Project</th>
                    <th scope="col">Delete</th>
                    
                </tr></thead><tbody>
                <?php
                $count=0;
                    try{
                        $dbhandler=new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql='select * from projects where enable=0';
                        
                        $query=$dbhandler->query($sql);                 //   there is some problem here
                        
                        while($r=$query->fetch())
                        {
            
                                echo '<tr>'
                                . '<td>'.$r['project_id'].'</td>'
                                . '<td>'.$r['definition'].'</td>'
                                . '<td>'.$r['description'].'</td>'
        
                                . '<td><a href="update_project.php?id='.$r['project_id'].'">update</a></td>'
                                . '<td><a href="enable_project_sql.php?id='.$r['project_id'].'">enable</a></td>'
                                . '<td><a href="delete_project_sql.php?id='.$r['project_id'].'">delete</a></td>'
                                        .'</tr>';
                            $count++;
                        }
                        
                    } catch (Exception $ex) {
                        echo 'hello! There is some error!';
                    }
                    echo '<tr>
                        <td colspan="6" align="center">Total:  '.$count.'</td>
                    </tr>';
                ?>
               </tbody>
            </table>

                <h4 align="center" style="color:red;">
                    <b>THIS ARE ONLY Disabled Projects</b></td>
                </h4><br><br>
</section>
<?php include 'C:\xampp\htdocs\PANM1\footer.php';?>