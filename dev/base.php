<?php 
@session_start();
if($_SESSION['logged']==false)
header("Location: login.php");
?>

<div class ="workspace-heading" id="heading" data-toggle="collapse" data-parent="#accordion" href="#sidebar">
	Baseview
</div>
		
<div class="Data" id="data">
<p>
 <a href="datadump.php">generate test data</a> 
<p>
Creates 200 users, 2000 boards and 8000 tickets	
</div>