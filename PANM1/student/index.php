<?php
session_start();
if(!isset($_SESSION['student_id']))
{
    header("location:../index.php?msg=AUTHENTICATION REQUIRED");
}
?>

<?php
try {
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=project_db', 'root', '');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'select * from allocation_process where id=1';
    $query = $dbhandler->query($sql);
    $r = $query->fetch();
    if ($r['process'] == 8) {
        header('location:../index.php?msg=System closed !!!');
    }
} catch (Exception $ex) {
    echo 'problem occur try again ';
}
?>
    <!--  display all the stuff    -->
    
    <?php include '../header.php'; ?>
    <section class="container-fluid header-section">

    <div class="student_data">        
        <h3 style="font-family: 'times new roman';" align="right">Id: <?php echo $_SESSION['student_id']; ?>  &emsp;   Name : <?php echo $_SESSION['student_name']; ?>&emsp; <a href="./student_logout.php">Logout</a>&emsp;</h3>
        <h3 class="msg">
        <?php
                            if(isset($_GET['msg']))
                                echo $_GET['msg'];
                        ?>
    </h3>
        <br>
        <br>
        <?php
            try{
                $dbhandler=new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql='select leader,allocated from students where student_id='.$_SESSION['student_id'];
                $query=$dbhandler->query($sql);
                $r1=$query->fetch();
                
                $sql='select * from allocation_process where id=1';
                $query=$dbhandler->query($sql);
                $r2=$query->fetch();
   
                if($r2['process']==1){
                    if($r1['leader']==0 || $r1['leader']==$_SESSION['student_id']){
                        echo '<a href="./group/make_group.php">Make or Update the Group</a>';
                    }
                    else{
                        echo 'You already grouped with leader, leader id is : '.$r1['leader'];
                    }
                }
                
                echo '<br><br>';
                
                if($r1['allocated']==1){
                    $s='select project from groups where leader='.$r1['leader'];
                    $q=$dbhandler->query($s);
                    $r=$q->fetch();
                    $ss='select * from projects where project_id='.$r['project'];
                    $qq=$dbhandler->query($ss);
                    $rr=$qq->fetch();
                    echo '<h5>Project alredy allocated to your group<br>Project Id : '.$rr['project_id'].'<br>Project Definition : '.$rr['definition'].'<br>Project Description : '.$rr['description'].'</h5>';
                }
                else if($r2['process']==2 || $r2['process']==4 || $r2['process']==6){          //      condition to check round started
                    echo '<a href="project_selection/project_selection.php">Go to Project Selection</a>';
                }
                else if($r2['process']==7 || $r2['process']==8){
                    echo 'After third round you can\'t get any project based on your selection';
                }
                else{
                    echo 'For project selection wait untill next round start';
                }
            } catch (Exception $ex) {
                echo 'SQL Exception';
            }
        ?>
        <br>
        <br>
        <br>
        <a href="../change_pass/change_password.php">Change Password</a></div>
    </section>
    <?php include '../footer.php'; ?>