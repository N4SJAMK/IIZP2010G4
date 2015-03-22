<head>

    <meta charset="UTF-8"></meta>
    <meta content="user-scalable=no,initial-scale=1.0" name="viewport"></meta>
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
                <div class="logo">
					<a href="index.php?page=base">
							Admin panel
					</a>
				</div>
            </div>
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<li>
						<a href="index.php?page=users">Users</a>
					</li>
					<li>
						<a href="index.php?page=statistic">Statistics</a>
					</li>
					<li>
						<a href="index.php?page=dataBase">dataBase</a>
					</li>
				</ul>
			</div>
        </div>
		<div class ="countainer">
			<?php
				@$page = $_GET['page'];	/* gets the variable $page */
				if (!empty($page)) {
					$page .= '.php';
					include($page);
				} 			/* if $page has a value, include it */
				else {
					include('base.php');
				} 	/* otherwise, include the default page */
			?>
        </div>
    </div>
	<script src="scripts.js"></script>
</body>
</html>