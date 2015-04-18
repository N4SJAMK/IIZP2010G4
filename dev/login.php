<?php
ini_set('display_errors', '1');
session_start();

if(isset($_POST['login'])){	
	require "database.php";
	define("DB_NAME", "testi-kanta");
	$db = Database::DB(DB_NAME);
	$collection = new MongoCollection($db, 'admin');
	
	$query = array('name' => $_POST['userName']);	
	$cursor = $collection->findOne($query);
	
	if($_POST['userName'] == $cursor['name']){
		if(password_verify($_POST['password'], $cursor['salasana'])){
			$_SESSION['logged'] = true;
			header("Location: index.php");
		}			
	}		
}
?>
<html>
<head>
    <meta charset="UTF-8"></meta>
    <meta content="user-scalable=no,initial-scale=1.0" name="viewport"></meta>
	 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato"></link>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster"></link>
    <link rel="stylesheet" href="styles.css"></link>
<title>
   Admin Panel

</title></head>
<body>
    <div id="application">
        <div class="view view-form">
            <div class="content">
                <form class="form" action="login.php" method="post">
					<div class="logo">
						<h1>  Contriboard admin panel</h1>
					</div>
                    <section class="input">
                        <label>
							User name
                        </label>
						<br>
						<input type="text"  required="" name="userName"></input>
                    </section>
                    <section class="input">
                        <label>
							Password
                        </label>
						<br>
                        <input type="password" required="" name="password"></input>
                    </section>
                    <input class="bg-info" type="submit" name="login" value="Login"></input>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

