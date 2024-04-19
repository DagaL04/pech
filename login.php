<?php

session_start();

if(issest($_SESSION['user_id'])) {
	header('Location: /php-login');
}

require 'databse.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$records =$conn->prepare('SELECT id, email, password FROM users WHERE email=:email')
	$records->bindParam('!email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$message = '';
	
	if(count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
		$_SESSION['user_id'] = $results['id'];
		header('Location: /php-login');
	}else{
		$message = 'Sorry those credentials does not exist'
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>

</head>

<body>
<header>
<a href="/php-login">"Upy server"
</header>


<h1>Login</h1>
<span>or <a href="signup.php"> SignUp</span>

<?php if (!empty($message)) : ?>
<p><?= $message ?> </p>
<?phpendif;?>

<form action="login.php" method="post">
<input type="text" name="email" placeholder="Enter your email"
<input type="text" name="password" placeholder="Enter your password"
<input type="submit" value="send"

</form>
</body>
</html>
