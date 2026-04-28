<?php
session_start();

if(!isset($_COOKIE['status'])){
    header('location: login.php');
}

if(!isset($_SESSION['users'])){
    $_SESSION['users'] = [
        ['id'=>1, 'username'=>'abc', 'email'=>'abc@aiub.edu'],
        ['id'=>2, 'username'=>'xyz', 'email'=>'xyz@aiub.edu'],
        ['id'=>3, 'username'=>'alamin', 'email'=>'alamin@aiub.edu'],
        ['id'=>4, 'username'=>'test', 'email'=>'test@aiub.edu'],
        ['id'=>5, 'username'=>'pqr', 'email'=>'pqr@aiub.edu']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User CRUD</title>
</head>
<body>

<h1>User List</h1>

<a href="home.php">Back</a> |
<a href="../controller/logout.php">Logout</a>

<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
    </tr>

    <?php foreach($_SESSION['users'] as $user){ ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>