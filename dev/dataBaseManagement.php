<?php 
@session_start();
if($_SESSION['logged']==false)
header("Location: https://www.youtube.com/watch?v=WIKqgE4BwAY");
?>
<div class ="workspace-heading" id="heading" data-toggle="collapse" data-parent="#accordion" href="#sidebar">
				Database Management
			</div>
		
			<div class="Data" id="data">
				<?php 

?>
<button>Snapshot</button>
<button onclick= "getFile()"> Export </button> 
<input type="file" id="exportFile" value="exportFileValue">
	
			</div>