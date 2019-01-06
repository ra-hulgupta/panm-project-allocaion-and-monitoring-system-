<?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:admin_login.php?msg=AUTHENTICATION REQUIRED");
}
?>


<!--         display all the stuff    -->

<html>
    <head>
        <title>Project Allocation</title>
        <link rel='icon' href="../favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Robot" content="index,follow,project,allocation,distribution,subject"/>
        <meta name="Description" content="Online Project Allocation is available over here"/>
        <link rel="stylesheet" type="text/css" href="../main.css">
    </head>
    <body>
        <h1 align="center">Project Allocation</h1>
        <br>
        <h3 align="right"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>   &emsp;    Id: <?php echo $_SESSION['faculty']; ?>  &emsp;       Name : <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="admin_logout.php" class="log_out shadow">Logout</a>&emsp;</h3>
        <br>
        
		
        <form>
            <table align="center" border="1">
                <tr>
                    <th>LeaderId</th>
                    <th>Work</th>
					<th>Description</th>
                </tr>
                <?php
                $count=0;
                    try{
                        $dbhandler=new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
                        $sql='select * from assign';
                        
                        $query=$dbhandler->query($sql);                 //   there is some problem here
                        
                        while($r=$query->fetch())
                        {
								echo '<tr>'
                                . '<td>'.$r['Leaderid'].'</td>'
                                . '<td>'.$r['Work'].'</td>'
								. '<td>'.$r['Description'].'</td>';
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
		
		
		
    </body>
</html>