<?php

	require_once("./include/variable.inc.php");
	require_once("./include/session.inc.php");
	require_once("./include/footer.inc.php");
    $user_name = $_SESSION["user_name"];
    $member_id = $_SESSION["member_id"];
?>

<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<title>ASSIGNMENT 5</title>
	</head>
	<body id="container">
		<header>
			<div id="header">
    		<h2>ASSIGNMENT 5: Member Page</h2>
    		</div>
		</header>
			<div>
				<div>
					<h2>Members Page</h2>
					<div id="top">
						<p> Hello <?= $user_name ?>, This is the membership page. You belong to the AWESOME Club.<br>
                   		 Only members have access to this page.</p>
						<p><a href="logout.php">Logout</a></p>
					</div>
				</div>
			</div>
	</body>

</html>