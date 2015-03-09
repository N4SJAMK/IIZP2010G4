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
        <div class="sidebar">
            <div class="logo-container">
                <div class="logo">
				Admin panel
				</div>
            </div>
			<div class="btn-group-vertical" style = "width:100%">
				<button type="button" onclick="jtn()" class="btn btn-primary">Statistics</button>
				<button type="button" onclick="jtn()" class="btn btn-primary">Users</button>
				<button type="button" onclick="DatabaseManagement()" class="btn btn-primary">Database management</button>
				
			</div>
        </div>
        <div class="view view-workspace">
		<div class ="topbar">
			<div class ="workspace-heading ">
			Perus näkymä
			</div>
		</div>
        <div class="Data" id="data">
				
        </div>
        </div>
    </div>
	<script src="scripts.js"></script>
</body>
</html>