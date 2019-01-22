<!--all the links working perfect-->
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
        <h3 style="float:right"><a href="p/insert_project.php">Add New Project</a>&emsp;<?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>_Id: <?php echo $_SESSION['faculty']; ?>&emsp;Name: <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="admin_logout.php">Logout</a></h3>      
        
        <h4 class="msg"><?php if(isset($_GET['msg']))
        {
            echo "<br><br><br>".$_GET['msg']."<br><br>";
        }
            ?></h4>
        <br><br><br><br><br><br>
            <table class="table table-dark table-borderless table-lg table-hover" align="center" style="font-size:19px;font-weight:400;background-color:rgba(255,255,255,0.3);">
                <tr>
                    <th scope="col">Project Id</th>
                    <th scope="col">Definition</th>
                    <th scope="col">Description</th>
                    <th scope="col">Update project details</th>
                    <th scope="col">Disable Project</th>
                    <th scope="col">Delete</th>
                </tr>
                <?php
                $count=0;
                    try{
                        $dbhandler=new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql='select * from projects where enable=1';
                        
                        $query=$dbhandler->query($sql);                 //   there is some problem here
                        
                        while($r=$query->fetch())
                        {
            
                                echo '<tr>'
                                . '<td>'.$r['project_id'].'</td>'
                                . '<td>'.$r['definition'].'</td>'
                                . '<td>'.$r['description'].'</td>'
                                . '<td><a href="p/update_project.php?id='.$r['project_id'].'">Update</a></td>'
                                . '<td><a href="p/disable_project_sql.php?id='.$r['project_id'].'">Disable</a></td>'
                                . '<td><a href="p/delete_project_sql.php?id='.$r['project_id'].'">Delete</a></td>'
                                        .'</tr>';
                            $count++;
                        }
                        
                    } catch (Exception $ex) {
                        echo 'hello! There is some error!';
                    }
                echo '<tr>
                    <td colspan="6" align="center">Total : '.$count.'</td>
                </tr>'?>
                </table><br><br>
                <h3 align="center">
                <b style="color:red;">THIS ARE ONLY ENABLED PROJECTS</b><br><br>
                <i>For disabled project: <a href="p/disabled_projects_list.php">Click here</a></i></h3>
                </section>
<?php include 'C:\xampp\htdocs\PANM1\footer.php';?>