<!--everything is fine except handling of passwd settings-->
<?php   include 'C:\xampp\htdocs\PANM1\header.php';?>
        <section class="container-fluid header-section link-shadowed" style="margin-top:110px;margin-bottom:110px;">
        <a style="float:left;" href="../index.php"><= Back</a><br><br><br>
        <form class="form-horizontal" style="margin-left: 20%;margin-right: 20%;display: block;" method="post">
            <table class="table table-borderless" align="center" style="width:50%;height:auto;text-align:center;">
                <thead><tr colspan="2"><th scope="col">Admin Login</th></tr></thead>
                <tbody>
                <tr>
                    <td>Admin Id :</td>
                    <td><input type="text" name="admin_id" class="textbox" required></td>
                </tr>
                <tr>
                    <td>Admin Password :</td>
                    <td><input type="password" name="admin_passwd" class="textbox" required></td>
                </tr>
                

        <?php
        session_start();
        if(isset($_POST['admin_id']) && isset($_POST['admin_passwd']))
	{
		$u=$_POST['admin_id'];
		$p=$_POST['admin_passwd'];
                
                try{
                    
                    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=project_db','root','');
                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $sql='select password,admin,name from faculty where faculty_id=? && password=? && admin=1 && enable=1';
                    $query=$dbhandler->prepare($sql);
                    $query->execute(array($u,$p));
                    $r=$query->fetch();
                
                    if( $r != NULL)
                    {
                        if($r['password']==$p){
                            $_SESSION['faculty']=$u;
                            $_SESSION['faculty_name']=$r['name'];
                            if($r['admin']==1){
                                $_SESSION['admin']=$u;
                            }
                            if(isset($_POST['code'])){
                                if($_SESSION['code']==$_POST['code']){
                                    unset($_SESSION['try']);
                                    header("location:index.php");
                                }
                            }
                            else{
                                header("location:index.php");
                            }	
                    } else {
                            if (isset($_SESSION['try'])) {
                                    echo '<tr>'
                                    . '<td>Enter Code :</td>'
                                            . '<td><img src="../change_pass/captchafont.php">'
                                            . '</tr>'
                                            . '<tr>'
                                            . '<td colspan="2"><input type="text" name="code"></td>'
                                            . '</tr>';
                                    $_GET['msg']='INVALID LOGIN DETAILS';
                                }
                            else {
                                $_SESSION['try']=1;
                                $_GET['msg']='INVALID LOGIN DETAILS';
                            }
                        }
                    }
                    else{
                        if (isset($_SESSION['try'])) {
                                    echo '<tr>'
                                    . '<td>Enter Code :</td>'
                                            . '<td><img src="../change_pass/captchafont.php">'
                                            . '</tr>'
                                            . '<tr>'
                                            . '<td colspan="2"><input type="text" name="code"></td>'
                                            . '</tr>'
                                            . '<tr>'
                                            . '<td colspan="2" align="right"><a href="../change_pass/forgot_password.php">Forgot password !!</a></td>'
                                            . '</tr>';
                                    $_GET['msg']='INVALID LOGIN DETAILS';
                                }
                            else {
                                $_SESSION['try']=1;
                                $_GET['msg']='INVALID LOGIN DETAILS';
                            }
                    }
                }
                catch (Exception $ex){
                    echo "$ex"."<h2 class=\"msg\" align=\"center\">ohh! Error</h2><br>";
                }
	}
        ?>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Login"></td>
                </tr>
                <tr>
                    <td colspan="2" class="msg">
                        <?php 
                            if(isset($_GET['msg']))
                                echo $_GET['msg'];
                        ?>
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <br>
</section>
<?php include 'C:\xampp\htdocs\PANM1\footer.php' ;?>