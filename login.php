<html>
<head><title>Login</title>
</head>
<body>

<form action="member_page.php" method="POST">
User Name:<br />
<input type="text" name="name">
<br />
Password:<br />
<input type="password" name="password">
<br />
<input type="submit" name="submit" value="Login">
<input type="hidden" name="refer" value="<?php echo (isset($_GET['refer'])) ? $_GET['refer'] : 'index.php'; ?>">
</form>

<p>Didn't Have Acc?<a href='signup.php'>Click Me</p>
</body>
</html>
