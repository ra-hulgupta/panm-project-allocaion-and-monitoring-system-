<?php include('C:\xampp\htdocs\PANM1\header.php'); ?>
<section class="container-fluid header-section"> <!-- for background img-->

<div id="main">  <!-- main content-->  
<form class="form-horizontal myform" action="./data.php" method="POST">
    <div class="form-group">
      <label class="control-label col-xs-2" for="student_id" style="color:dodgerblue;font-weight:bold;">Student Id</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" id="student_id" placeholder="Enter Id" name="student_id" style="color:dodgerblue;font-weight:bold;">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-2" for="student_passwd" style="color:dodgerblue;font-weight:bold;">Password:</label>
      <div class="col-xs-10">          
        <input type="password" class="form-control" id="student_passwd" placeholder="Enter password" name="student_passwd" style="color:dodgerblue;font-weight:bold;">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-xs-offset-2 col-xs-10">
        <div class="checkbox">
          <label style="color:dodgerblue;font-weight:bold;"><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>
</div></section>

<?php include 'C:\xampp\htdocs\PANM1\footer.php'; ?>