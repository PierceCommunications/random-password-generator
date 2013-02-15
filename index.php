<?php header('Content-Type: text/html; charset=UTF-8'); ?><!DOCTYPE html>
<html>
<head>
<title>Pierce Random Password</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<div id="wrap">
		<img src="images/logo.png" alt="Pierce Communications" title="Pierce Communications" />
		<?php
			$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT,array('options'=>array('min_range'=>1, 'max_range'=>100)));
			$length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_INT,array('options'=>array('min_range'=>1, 'max_range'=>100)));
			$_SESSION['amount'] = $amount; 
			$_SESSION['length'] = $length;

			function randompass($length)
			 {
				 $chars = "0123GHIJKLMklmnopqNOPQRST456789abcdefghijrstuvwxyzABCDEFUVWXYZ!@$%^&()_-=+,|~";
				 $thepassword = '';
				 for($i=0;$i<$length;$i++)
				 {
				  $thepassword .= $chars{rand() % (strlen($chars)-1)};
				 }
			 return $thepassword;
			 }
		?>
		<div role="main">
			<form role="form" action="?" method="post" name="random">
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

