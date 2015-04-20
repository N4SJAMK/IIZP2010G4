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
ini_set('display_errors', '1');
require "database.php";
define ("DB_NAME" , "testi-kanta");
 
$db = Database::DB(DB_NAME);
$collection = new MongoCollection($db,'users');
//if(isset($_POST['button']))
//{
$output = array();
$ret = null;
$cmd = 'mongoexport --db '. $db .'--collection '.$col.' --out /var/www/html/dev/dbbackup/'.$col.'.json';
exec($cmd, $output, $ret);
var_dump($output, $ret);
//}

?>
<form action='dataBaseManagement.php' method=post>
<button>Snapshot</button>
<button onclick= "getFile()"> Export </button> 
<input type="button" id="exportFile" value="expdb">
	
			</div>
