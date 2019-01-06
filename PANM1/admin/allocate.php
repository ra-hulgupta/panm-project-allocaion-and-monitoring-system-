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
        <h3 align="left"><a href="index.php"  class="back shadow"><= Back</a></h3>
        <!--<h3 align="right"><?php if(isset($_SESSION['admin'])){echo 'ADMIN';}else{echo 'FACULTY';} ?>   &emsp;    Id: <?php echo $_SESSION['faculty']; ?>  &emsp;       Name : <?php echo $_SESSION['faculty_name']; ?>&emsp;<a href="admin_logout.php" class="log_out shadow">Logout</a>&emsp;</h3>        <br>-->
        <a href="p/insert_project.php">Assign Project</a>
        <br>
       
        
        <h4 class="msg"><?php if(isset($_GET['msg']))
        {
            echo $_GET['msg'];
        }
            ?></h4>
        <br>
        
        <form>
            <table align="center" border="1">
                <tr>
                    <th>Leader Id</th>
                    <th>Member1</th>
					<th>Member2</th>
					<th>Member3</th>
					<th>Average</th>
					<th>PID1</th>
					<th>PID2</th>
					<th>PID3</th>
					<th>Allocated Projects</th>
					<th>ProjectID</th>
					<th>FACULTY</th>
					<th>Defintion</th>
					<th>Description</th>
                </tr>
                <?php
                $count=0;
                    try{
                        $dbhandler=new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
                        $sql='select * from groups as g , projects as p WHERE g.Allocate9=p.project_id';
                        
                        $query=$dbhandler->query($sql);                 //   there is some problem here
                        
                        while($r=$query->fetch())
                        {
								echo '<tr>'
                                . '<td>'.$r['leader'].'</td>'
                                . '<td>'.$r['mem1'].'</td>'
								. '<td>'.$r['mem2'].'</td>'
								. '<td>'.$r['mem3'].'</td>'
								.'<td>'.$r['average'].'</td>'
								. '<td>'.$r['PID1'].'</td>'
								. '<td>'.$r['PID2'].'</td>'                                
								. '<td>'.$r['PID3'].'</td>'
								.'<td>'.$r['Allocate9'].'</td>'
								.'<td>'.$r['project_id'].'</td>'
								.'<td>'.$r['faculty'].'</td>'
								.'<td>'.$r['definition'].'</td>'
								.'<td>'.$r['description'].'</td>';
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
                echo '<tr>
                    <td colspan="6"><br></td>
                </tr>
                
                <tr>
                    <td colspan="6"><b>THIS ARE ONLY ENABLED PROJECTS</b></td>
                </tr>
                <tr>
                    <td colspan="6">Total : '.$count.'</td>
                </tr>';
                ?>
                <tr>
                    <td colspan="6"><br></td>
                </tr>
                
                <tr>
                    <td colspan="6"><i>For disabled project  : <a href="p/disabled_projects_list.php">Click here</a></i></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php

$connect=mysqli_connect("127.0.0.1","root","","project_db");

$sql="select * from groups ORDER BY average DESC";
$result=mysqli_query($connect,$sql);


$groups="select Allocate9 from groups";
//$allocateres=mysqli_query($connect,$sql);
//$numallocate=mysqli_fetch_array($allocateres);


while($row=mysqli_fetch_array($result))
{

$check="select * from groups where Allocate9=$row[6]";

$resultcheck=mysqli_query($connect,$check);
$resultrows=mysqli_num_rows($resultcheck);
//$var=$numgroups['Allocate9'];
echo $resultrows;

if($resultrows==0)
{
	
	$updt="UPDATE groups SET Allocate9=$row[6] where leader=$row[0]";
	$resupdt=mysqli_query($connect,$updt);	
}

if($resultrows==1 && $row[9]==0)
{
	$check="select * from groups where Allocate9=$row[7]";

	$resultcheck=mysqli_query($connect,$check);
	$resultrows=mysqli_num_rows($resultcheck);
	if($resultrows==0)
	{
	$updt="UPDATE groups SET Allocate9=$row[7] where leader=$row[0]";
	$resupdt=mysqli_query($connect,$updt);	
	}
	else
	{
	$check="select * from groups where Allocate9=$row[8]";

	$resultcheck=mysqli_query($connect,$check);
	$resultrows=mysqli_num_rows($resultcheck);
	if($resultrows==0)
	{
	$updt="UPDATE groups SET Allocate9=$row[8] where leader=$row[0]";
	$resupdt=mysqli_query($connect,$updt);		
	}
	else
	{
		echo "sorry all your preference is allotted";
	}
		
	
}	
	
}

}
?>

