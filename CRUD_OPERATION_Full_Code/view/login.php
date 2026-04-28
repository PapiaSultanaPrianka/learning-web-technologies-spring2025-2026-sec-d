<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>

    <form method="post" action="../controller/loginCheck.php">
        Username:
        <input type="text" name="username" value="">
        <br>

        Password:
        <input type="password" name="password" value="">
        <br>

        <input type="submit" name="submit" value="Login">
        <a href="signup.php">Signup</a>
    </form>

</body>
</html>