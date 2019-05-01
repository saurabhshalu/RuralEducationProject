<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>VS3 Portal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body onresize="resize()">
	<div class="wrapper">
		<?php
			$_SESSION['redirected'] = true;
			require './header.php';
		?>
	    <div class="main">
	    	<div class="leftPanel">
	    		<div id="a0" class="about">
					
	    			<?php
		    			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==1)
		    			{
		    				if($_SESSION['userType']=='teacher')
		    					include 'requests.php';
		    				else
		    					include 'needs.php';
		    			}
		    			else
		    				include 'about.php';
		    		?>
	    		</div>
	    		<div id="a1" class="module">
		    		<?php

		    			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==1)
		    			{
		    				if($_SESSION['userType']=='teacher')
		    					include 'addinterests.php';
		    				else
		    					include 'interestedteachers.php';

		    			}
		    			else
		    			{
		    				include 'recents.php';
		    			}

		    		?>

	    			
	    		</div>
	    	</div>
	    	<div class="rightPanel">
	    		<?php

	    			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==1)
	    			{
	    					include 'details.php';
	    			}
	    			else
	    			{
	    				include 'login.php';
	    			}

	    		?>
	    	</div>
	    </div>
	    <div class="footer">
	    	<ul>
	    		<li>Saurabh Shalu</li>
	    		<li>Shivam Cholin</li>
	    		<li>Suzen Christian</li>
	    		<li>Mahershi Bhavsar</li>
	    		<li><a href="mailto:vs3rocks@gmail.com">Mail US</a></li>
	    	</ul>
	    </div>

	</div>
	<script src="./js/jquery-3.3.1.min.js"></script>
	<script src="./js/main.js"></script>
	<script src="./js/bootstrap.min.js"></script>
</body>
</html>