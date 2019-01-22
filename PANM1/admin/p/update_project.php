<!--updating with valid data-->
<?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:../admin_login.php?msg=AUTHENTICATION REQUIRED");
}


    //  display the form for updating the project
    //   send data to update_project_sql.php by POST method
?>

<?php 
      include('C:\xampp\htdocs\PANM1\header.php'); ?>
      <section class="container-fluid header-section link-shadowed" style="margin-top:80px;margin-bottom:220px;">
        <!-- for background img-->
        <h3 style="display:inline-block;float:left;"><a href="../project.php"><= Back</a></h3>
        <h3 style="float:right;"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>_Id: <?php echo $_SESSION['faculty']; ?>&emsp;Name: <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="../admin_logout.php">Logout</a></h3><br><br><br>
       <h3 class="msg">
                <?php
                if(isset($_GET['msg']))
                {
                    echo "".$_GET['msg']."<br><br>";
                }
                ?>
            </h3>
            <br><br>

        <form action="update_project_sql.php" onsubmit="return Validate()" method="post">
            <table class="table table-dark table-sm" align="center" style="text-align:center;font-size:18px;font-weight:500;background-color:rgba(255,255,255,0.3);width:70%;">
             <thead>
                <tr>
                    <th scope="col">Update Project</th>
                </tr></thead>
                <tbody>
            <?php
            try{
                if(!isset($_GET['id']))
                {
                    header("location:../project.php?msg=please provide project id");
                }
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $query=$dbhandler->prepare("select * from projects where project_id=?");
                $query->execute(array($_GET['id']));
                $r=$query->fetch();
                if($r==null)
                {
                    header("location:../project.php?msg=project id not available");
                }
                else{
                    echo '<tr>
                    <td>Project Id</td>
                    <td><input type="hidden" id="id" name="p_id" value="'.$r['project_id'].'"><input type="text" id="id1" name="p_id1" value="'.$r['project_id'].'" disabled></td>
                </tr>
                <tr>
                    <td>Definition</td>
                    <td><input type="text" id="definition" class="textbox" name="p_definition" value="'.$r['definition'].'" required></td>    
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea row="3" id="description" cols="30" class="textbox" name="p_description">'.$r['description'].'</textarea></td>
                </tr>
                
                <tr>
                    <td>Enable project to display</td>
                    <td><input type="checkbox" name="p_enable" ';if($r['enable']){echo 'checked';}else{echo 'unchecked';}echo '></td>
                </tr>';
                }
            }
            catch (PDOException $e){
                header("location:../project.php?msg=hi");
            }
            ?>
                <tr>
                    <td colspan="2">&emsp;&emsp;<input type="submit" value="UPDATE PROJECT">&emsp;&emsp;&emsp;
                    <input type="reset" value="Reset"></td>
                </tr></tbody>
            </table>
        </form>
</section>
<script type="text/javascript" src="validate.js"></script>
<?php include 'C:\xampp\htdocs\PANM1\footer.php';?>