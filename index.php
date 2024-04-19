<?php

session_start();

require 'database.php';

if (isset($_SESSION['user_id'])){
	$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id')
	records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$user = null;
	
	if(count($results) > 0) {
		$user = $results;
	}
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Welcome to Upy Server </title>
</head>

<header>
<a href="/php-login">"Upy server"
</header>

<body>
<?php if(!empty($user)): ?>
<br> Welcome. <?= $user['email']?>
<br>You have successfully logged in
<a href="logout.php">Logout</a>
<?php else: ?>


<h1>please login or SignUp</h1>
<a href="login.php">login</a> or 
<a href="signup.php">Sign up</a>
<?php endif; ?>
</body>
</html>
