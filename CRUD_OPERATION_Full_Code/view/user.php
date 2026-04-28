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

$users = $_SESSION['users'];

if(isset($_POST['add'])){
    $username = $_POST['username'];
    $email = $_POST['email'];

    if($username == "" || $email == ""){
        echo "null username/email!";
    }else{
        $lastId = 0;

        foreach($users as $u){
            if($u['id'] > $lastId){
                $lastId = $u['id'];
            }
        }

        $users[] = [
            'id' => $lastId + 1,
            'username' => $username,
            'email' => $email
        ];

        $_SESSION['users'] = $users;
        header('location: user.php');
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if($id == "" || $username == "" || $email == ""){
        echo "null id/username/email!";
    }else{
        foreach($users as $key => $u){
            if($u['id'] == $id){
                $users[$key]['username'] = $username;
                $users[$key]['email'] = $email;
                break;
            }
        }

        $_SESSION['users'] = $users;
        header('location: user.php');
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    foreach($users as $key => $u){
        if($u['id'] == $id){
            unset($users[$key]);
            break;
        }
    }

    $_SESSION['users'] = array_values($users);
    header('location: user.php');
}

$editUser = null;

if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    foreach($users as $u){
        if($u['id'] == $id){
            $editUser = $u;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User CRUD</title>
</head>
<body>

    <h1>User CRUD Operation</h1>

    <a href="home.php">Back</a> |
    <a href="../controller/logout.php">Logout</a>

    <br><br>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $editUser['id'] ?? ''; ?>">

        Username:
        <input type="text" name="username" value="<?php echo $editUser['username'] ?? ''; ?>">
        <br>

        Email:
        <input type="email" name="email" value="<?php echo $editUser['email'] ?? ''; ?>">
        <br>

        <?php if($editUser != null){ ?>
            <input type="submit" name="update" value="Update">
        <?php }else{ ?>
            <input type="submit" name="add" value="Add">
        <?php } ?>
    </form>

    <br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>ACTION</th>
        </tr>

        <?php foreach($_SESSION['users'] as $user){ ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="user.php?edit=<?php echo $user['id']; ?>">Edit</a> |
                    <a href="user.php?delete=<?php echo $user['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>