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
    <title>Admin paneeli</title>
</head>
<body>
    <div class="application">
	
        <div class="sidebar" id="sidebar">
            <div class="logo-container">
			 <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <div class="logo">
					<a href="index.php?page=base">
							Admin panel
					</a>
				</div>
            </div>
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<li>
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						<a href="index.php?page=users"> Users</a>
					</li>
					<li>
						<span class=" glyphicon glyphicon-signal" aria-hidden="true"></span>
						<a href="index.php?page=statistic"> Statistics</a>
					</li>
					<li>
						<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
						<a href="index.php?page=dataBaseManagement">  dataBase</a>
					</li>
				</ul>
			</div>
        </div>
		<div class ="countainer">
			<?php
				@$page = $_GET['page'];
				if (!empty($page)) {
					$page .= '.php';
					include($page);
				}
				else {
					include('base.php');
				}				
			?>
			
        </div>
    </div>
	<script src="scripts.js"></script>
</body>
</html>