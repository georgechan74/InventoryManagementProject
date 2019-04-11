<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-table.css" />

	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script type="text/javascript" src="RESOURCES/libs/FileSaver/FileSaver.min.js"></script>
  	<script type="text/javascript" src="RESOURCES/tableExport.js"></script>
	<script type="text/javascript" src="RESOURCES/libs/jsPDF/jspdf.min.js"></script>
	<script type="text/javascript" src="RESOURCES/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.6.2/core.min.js"></script>
	<script src="bootstrap-table.js"></script>
	<script type="text/javascript" src="RESOURCES/extensions/toolbar/bootstrap-table-toolbar.js"></script>

	<meta charset="utf-8"/>

</head>
<body>
	<?php
		
		session_start();
		if (isset($_SESSION['userRoles']))
			$pieces = explode(",", $_SESSION['userRoles'][0]);
	?>

	<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
		<a class="navbar-brand"><img src="acwm_logo.png"></a>
	</nav>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="nav navbar-nav ml-auto w-100 justify-content-left">

				<li class="nav-item active">
					<a class="btn btn-dark" href="home.php" role="button">Home</a>
				</li>

				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Assets
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="assets.php">Fixed/Portable</a>
							<a class="dropdown-item" href="vehicles.php">Vehicles</a>
						</div>
					</div>
				</li>

				<li class="nav-item active">
					<a class="btn btn-dark" href="receive.php" role="button">Receive</a>
				</li>

				<li class="nav-item active">
					<a class="btn btn-dark" href="reports.php" role="button">Reports</a>
				</li>

				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Salvage
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="salvage_assets.php">Fixed/Portable</a>
							<a class="dropdown-item" href="salvage_vehicles.php">Vehicles</a>
							<a class="dropdown-item" href="salvage_forms.php">Forms</a>
						</div>
					</div>
				</li>

			</ul>

			<ul class="nav navbar-nav ml-auto w-100 justify-content-end">
				<?php if ((isset($_SESSION["username"])) && in_array("ADMIN", $_SESSION['userRoles'])) { ?>
				<li class="nav-item active">
					<a class="btn btn-dark" href="admin.php" role="button">Administration</a>
				</li>
				<?php } ?>
				<li class="nav-item active">
					<!-- <button type="button" class="btn btn-outline-success float-right">Logout</button> -->
					<a href="logout.php" class="btn btn-outline-success float-right" role="button">Logout</a>
				</li>
			</ul>

		</div>
	</nav>

	<!-- content -->


</body>
</html>