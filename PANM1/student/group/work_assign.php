
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
        header('location:../index.php?msg=You alredy grouped can\'t create group now');
    }
} catch (Exception $ex) {
    echo 'problem occur try again '.$ex;
}
?>




<html>
    <head>
        <title>Project Allocation</title>
        <link rel='icon' href="../../favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Robot" content="index,follow,project,allocation,distribution,subject"/>
        <meta name="Description" content="Online Project Allocation is available over here"/>
        <link rel="stylesheet" type="text/css" href="../../main.css"> 
    </head>
    <body>
        <h1 align="center">Monitoring</h1>
        <h3 align="left"><a href="../index.php" class="back shadow"><= Back</a></h3>
		<h3 align="left"><a href="../index.php" class="back shadow">Work Assign</a></h3>
        <h3 align="right">Id: <?php echo $_SESSION['student_id']; ?>  &emsp;       Name : <?php echo $_SESSION['student_name']; ?>&emsp;<a href="../student_logout.php" class="log_out shadow">Logout</a>&emsp;</h3>
		<form>
            <table align="center" border="1">
                <tr>
                    <th>Work_no</th>
                    <th>Work</th>
                </tr>
                <?php
                $count=0;
                    try{
                        $dbhandler=new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
                        $sql='select * from assign where Leaderid=' . $_SESSION['student_id'].'';
                        
                        $query=$dbhandler->query($sql);                 //   there is some problem here
                        
                        while($r=$query->fetch())
                        {
								echo '<tr>'
                                . '<td>'.$r['Work_No'].'</td>'
                                . '<td>'.$r['Work'].'</td>';
								//$sql = 'SELECT * FROM projects WHERE project_id ='.$r['Allocate9'].'.';
								//$query=$dbhandler->query($sql);
								//while($r=$query->fetch()){
								
								//$sql = "UPDATE groups SET Allocated Projects='PID1' where limit 1";
								
                                //echo '<td>'.$r['definition'].'</td>';
								//$count++;
								//}
                                //. '<td><a href="p/disable_project_sql.php?id='.$r['project_id'].'">disable</a></td>'
                                ///. '<td><a href="p/delete_project_sql.php?id='.$r['project_id'].'">delete</a></td>'
                                 //       .'</tr>';
                            $count++;
                        }
                        
                    } catch (Exception $ex) {
                        echo 'hello! There is some error!';
                    }

                ?>
            </table>
        </form>
		
		<form action="insert1s.php" method="post">
	<p>
    	<label for="firstName">Work NO:</label>
        <input type="text" name="Work_no" id="Work_no">
    </p>
    <p>
    	<label for="lastName">Description:</label>
        <input type="text" name="Description" id="Description">
    </p>
    <input type="submit" value="Add Records">
</form>

    </body>
</html>
