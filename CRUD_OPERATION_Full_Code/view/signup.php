<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
</head>
<body>

    <h1>Signup</h1>

    <form method="post" action="../controller/signupCheck.php">
        Username:
        <input type="text" name="username" value="">
        <br>

        Password:
        <input type="password" name="password" value="">
        <br>

        Email:
        <input type="email" name="email" value="">
        <br>

        <input type="submit" name="submit" value="Signup">
        <a href="login.php">Login</a>
    </form>

</body>
</html>