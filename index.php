<!DOCTYPE html>
<html>
<head>
<title>Pierce Random Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
	<div id="wrap">
		<img src="images/logo.png" alt="Pierce Communications" title="Pierce Communications" />
		<?php
			$amount = $_POST["amount"];
			$length = $_POST["length"];
			$_SESSION['amount'] = $_POST['amount'];
			$_SESSION['length'] = $_POST['length'];			

			function randompass($length)
			 {
				 $chars = "0123GHIJKLMklmnopqNOPQRST456789abcdefghijrstuvwxyzABCDEFUVWXYZ";
				 $thepassword = '';
				 for($i=0;$i<$length;$i++)
				 {
				  $thepassword .= $chars{rand() % 60};
				 }
			 return $thepassword;
			 }   
		?>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="random">
			<label name="amount">How many passwords?</label>
			<br /> 
			<input name="amount" type="number" value="<?php echo $_SESSION['amount'];?>" required>
			<br /> 
			<label name="length">Password length (characters)</label>
			<br /> 
			<input name="length" type="number" value="<?php echo $_SESSION['length'];?>" required>
			<br /> 
			<button type="submit">Generate Passwords</button>
		</form>
		<?php
			for($i=0;$i<$amount;$i++)
			{
			$password=randompass($length);
			echo "<h1>$password</h1>";
			}
		?>
	</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</body>
</html>

