<?php
require 'database.php'

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])){
$sql = "INSERT INTO users (email, password) VALUES (:email, :password)"
$stmt = $conn->prepare($sql);
$stmt->binParam(':email',$_POST['email']);
$password = password_hash($_POST['passwor'], PASSWORD_BCRYT);
$stmt->binParam(':password',$password);

if (stmt->excute()){
$message = 'Seccesfully created ew user';}
else{
	$message = 'Sorry, password has not been created';
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up</title>
<span>or <a href="login.php"> Login</span>
</head>
<header>
<a href="/php-login">"Upy server"
</header>
<body>

<?php if(!empty($message)): ?>
<p><?= $mesagge ?></p>
<?php endif; ?>

<form action="signup.php" method="post">
<input type="text" name="email" placeholder="Enter your email"
<input type="text" name="password" placeholder="Enter your password"
<input type="text" name="confirm_password" placeholder="Confirm your password"
<input type="submit" value="send"

</form>
</body>
</html>
