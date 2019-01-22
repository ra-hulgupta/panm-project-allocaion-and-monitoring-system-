<!--the addition of available projects is still to be done-->
<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("location:../../index.php?msg=AUTHENTICATION REQUIRED");
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
        header('location:../../index.php?msg=System closed !!!');
    }
    if ($r['process'] != 1) {
        header('location:../index.php?msg=Now you can\'t do any thing with group');
    }

    $sql = 'select leader from students where student_id=' . $_SESSION['student_id'].' && participate=1';
    $query = $dbhandler->query($sql);
    $r = $query->fetch();
    if ($r['leader'] != 0 && $r['leader'] != $_SESSION['student_id']) {
        header('location:../index.php?msg=You already grouped can\'t create group now');
    }
} catch (Exception $ex) {
    echo 'problem occur try again '.$ex;
}
?>
<?php 
        include('C:\xampp\htdocs\PANM1\header.php'); ?>
        <section class="container-fluid header-section link-shadowed"> <!-- for background img-->
        <div style="margin-top: 95px;margin-bottom:120px">
        <h1 align="center">Project Allocation</h1>
        <h3><a href="../index.php" style="float:left;"><= Back</a>
        <span style="display:inline-block; float:right;">Id:<?php echo $_SESSION['student_id']; ?>&emsp;Name: <?php echo $_SESSION['student_name']; ?>&emsp;<a href="../student_logout.php">Logout</a></span></h3><br><br><br>
            <form class="form-horizontal" style="margin-left: 20%;margin-right: 20%; height:70%;" action="make_group_sql.php" method="post">
<?php
try {
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=project_db', 'root', '');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'select * from groups where leader=' . $_SESSION['student_id'];
    $query = $dbhandler->query($sql);
    $r = $query->fetch();
    if ($r == NULL) {
        echo '<input type="hidden" name="insert" value="1">
                            <div class="form-group">
                            <label class="control-label col-xs-3" for="member1" style="color:dodgerblue;font-weight:bold;">First Member</label>
                            <div class="col-xs-9">
                            <input type="text" class="form-control textbox" id="member1" placeholder="Enter name" name="mem1" style="color:dodgerblue;font-weight:bold;">
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-xs-3" for="member1" style="color:dodgerblue;font-weight:bold;">Project Id 1</label>
                            <div class="col-xs-9">
                            <input type="text" class="form-control textbox" id="member1" placeholder="Enter Id" name="PID1" style="color:dodgerblue;font-weight:bold;">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-xs-3" for="member2" style="color:dodgerblue;font-weight:bold;">Second Member</label>
                            <div class="col-xs-9">
                            <input type="text" class="form-control textbox" id="member2" placeholder="Enter name" name="mem2" style="color:dodgerblue;font-weight:bold;">
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-xs-3" for="member2" style="color:dodgerblue;font-weight:bold;">Project Id 2</label>
                            <div class="col-xs-9">
                            <input type="text" class="form-control textbox" id="member2" placeholder="Enter Id" name="PID2" style="color:dodgerblue;font-weight:bold;">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label class="control-label col-xs-3" for="member3" style="color:dodgerblue;font-weight:bold;">Third Member</label>
                            <div class="col-xs-9">
                            <input type="text" class="form-control textbox" id="member3" placeholder="Enter name" name="mem3" style="color:dodgerblue;font-weight:bold;">
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-xs-3" for="member3" style="color:dodgerblue;font-weight:bold;">Project Id 3</label>
                            <div class="col-xs-9">
                            <input type="text" class="form-control textbox" id="member3" placeholder="Enter Id" name="PID3" style="color:dodgerblue;font-weight:bold;">
                            </div>
                            </div>
                            <div class="form-group">        
                            <div class="col-sm-offset-5 col-sm-7">
                            <button type="submit" class="btn btn-lg btn-success">Make group</button>
                            </div>
                            </div>';
    } else {
         echo '<table class="table table-sm table-hover">
                    <thead><tr><th scope="col">Your group member\'s are</th></tr></thead><tbody>' ; 
        if ($r['mem1'] == 0) {
            echo '<tr>
                                        <td>First Member</td>
                                        <td><input type="text" class="textbox" name="mem1" disabled></td>
                                    </tr>';
        } else {
            echo '<tr>
                                        <td>First Member</td>
                                        <td><input type="text" class="textbox" name="mem1" value=' . $r['mem1'] . ' disabled></td>
                                    </tr>';
        }
        if ($r['mem2'] == 0) {
            echo '<tr>
                                        <td>Second Member</td>
                                        <td><input type="text" class="textbox" name="mem2" disabled></td>
                                    </tr>';
        } else {
            echo '<tr>
                                        <td>Second Member</td>
                                        <td><input type="text" class="textbox" name="mem2" value=' . $r['mem2'] .  ' disabled></td>
                                    </tr>';
        }
        if ($r['mem3'] == 0) {
            echo '<tr>
                                        <td>Third Member</td>
                                        <td><input type="text" class="textbox" name="mem3" disabled></td>
                                    </tr>';
        } else {
            echo '<tr>
                                        <td>Third Member</td>
                                        <td><input type="text" class="textbox" name="mem3" value=' . $r['mem3'] . ' disabled></td>
                                    </tr>';
        }
        echo '</tbody></table><br><h3 align="center"><a href="work_assign.php">Work Assign</a></h3><br>';
    }
} catch (Exception $ex) {
    echo 'problem occur try again ',$ex;
}
?>                          </form>
            <br>
            <?php
            if (!isset($r) || $r == NULL){
                echo "<h3 style=\"color:red;\">Make group or wait for joining under another leader</h3>
            <br>
            <h4>You can make group of at max 4 student including you</h4>";
            }
            ?>        
            <h4>
                <?php 
                if(isset($_GET['msg']) || isset($_GET['msg1']) || isset($_GET['msg2']) || isset($_GET['msg3'])){
                    echo "<h3>Messages</h3>";
                }
                ?>      <br>
                <?php
                if (isset($_GET['msg']))
                    echo $_GET['msg'];
                ?>
                        <br>
                <?php
                if (isset($_GET['msg1']))
                    echo $_GET['msg1'];
                ?>
                        <br>
                <?php
                if (isset($_GET['msg2']))
                    echo $_GET['msg2'];
                    ?>
                        <br>
                    <?php
                    if (isset($_GET['msg3']))
                        echo $_GET['msg3'];
                    ?> 
            </h4>
            </div>
</section>
<?php include 'C:\xampp\htdocs\PANM1\footer.php'; ?>