<?php 
    session_start();   

    if (!empty($_SESSION["login"]))
    {
        header("Location:  /List/main.php");
    }

    if(isset($_GET['Reg']))
    {
        require('bd_users.php');

        $S = "select * from `user` where `name`='".$_REQUEST['name']."'";
        $res = mysqli_query($con, $S);
        $user = mysqli_fetch_assoc($res);

        if(empty($user)){
            $name=$_REQUEST['name'];
            $pass=$_REQUEST['pass'];

            $D="INSERT INTO `user`(`id`, `name`, `password`) VALUES (NULL,'$name','$pass')";
            mysqli_query($con, $D) or die("Error!");
    
            $_SESSION["nlogin"] = $users["name"];
            $_SESSION["password"] = $users["password"];

            header('Location: /List/main.php');
        }
        else{
            ?><script>alert('Name is occupied!')</script><?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <link href="Style.css" rel="stylesheet" type="text/css"> 
    </head>
    <body>
        <header>
        </header>
        <nav>
            <a href="main.php">Back</a>
        </nav>
        <main>
            <form method="get">
                <div class="inp">
                    <label for="name">Name:</label>
                    <input type="text" id="name" class="in" name="name" required>
                    <label for="pass">Password:</label>
                    <input type="password" id="pass" class="in" name="pass" required>
                </div>
                <div class="btns">
                    <input type="submit" value="Create" class="bt" name="Reg" >
                </div>
            </form>
        </main>
        <footer>

        </footer>
    </body>
</html>