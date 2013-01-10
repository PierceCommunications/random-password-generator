<!DOCTYPE html>
<html>
<head>
<title>Pierce Random Password</title>
<link rel="stylesheet" href="css/style.css" />
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
				 $chars = "0123GHIJKLMklmnopqNOPQRST456789abcdefghijrstuvwxyzABCDEFUVWXYZ!@£$%^&()_-=+,|~";
				 $thepassword = '';
				 for($i=0;$i<$length;$i++)
				 {
				  $thepassword .= $chars{rand() % strlen($chars)};
				 }
			 return $thepassword;
			 }
		?>
		<div role="main">
			<form role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="random">
				<label for="passwords" name="amount">How many passwords?</label>
				<br />
				<input id="passwords" name="amount" min="1" type="number" value="<?php echo $_SESSION['amount'];?>" required aria-required="true">
				<br />
				<label for="length" name="length">Password length (characters)</label>
				<br />
				<input id="length" name="length" type="number" value="<?php echo $_SESSION['length'];?>" required aria-required="true">
				<br />
				<button type="submit">Generate Passwords</button>
			</form>
		</div>
		<?php
			for($i=0;$i<$amount;$i++)
			{
			$password=randompass($length);
			echo "<h1>$password</h1>";
			}
		?>
	</div>
</body>
</html>

