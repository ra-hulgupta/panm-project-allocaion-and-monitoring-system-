
<?php
/*
 * ****************************************************************************
 * ****************************************************************************

  HEllo, THis projecT of PHP
  subject - Project Allocation

  c3 Batch sem-4

  CE046	HireN ItaliyA
  CE047	JaganI VatsaL
  CE048	MohiT JaiN
  CE049	AkshiT JariwalA     #

 * ****************************************************************************
 * ****************************************************************************
 */
?>


<?php
session_start();
if(!isset($_SESSION['faculty']))
{
    header("location:../admin_login.php?msg=AUTHENTICATION REQUIRED");
}

if(isset($_POST['leader']) && isset($_POST['pidal']) )     // check proper condition
{

    $temp=0;
          
    
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');

	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$leader = $_POST['leader'];
	$pidal = $_POST['pidal'];
	$sql='insert into allocate (leader,pidal) values (' . $leader . ',' . $pidal . ')';
        
        $query=$dbhandler->prepare($sql);
		$query->execute(array($leader,$pidal));
        /*$p=0;
        if(isset($_POST['p_enable']))
        {
            $p=1;
        }
	$query->execute(array($_POST['p_definition'],$_POST['p_description'],$p,$_POST['p_id']));
	
        }
        catch(PDOException $e){
                $msg='project details can\'t change';
                $temp=1;
                header("location:../project.php?msg='.$msg");
        }
        if($temp==0){
            header("location:../project.php?msg=Project ".$_POST['p_definition']." with id ".$_POST['p_id']." is successfully updated");
        }*/
    }
else {
        header("location:../project.php?msg=FILL REQUIRED DETAILS");
    }

?>
