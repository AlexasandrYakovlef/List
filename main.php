<?php
    session_start();   

    if (!empty($_SESSION["login"]))
    {
        header("Location:  /List/main.php");
    }
    
    if(isset($_GET['LogIn'])){
        require('bd_users.php');

        $S = "select * from `user` where `name`='".$_REQUEST['name']."' and `password`='".$_REQUEST['pass']."'";
        $res = mysqli_query($con, $S);
        $user = mysqli_fetch_assoc($res);

        if(empty($user)){
            ?><script>alert('Invalid username or password!')</script><?php
        }
        else{
            $_SESSION["login"] = $user["name"];
            $_SESSION["pass"] = $user["password"];
            header('Location: /List/index.php');
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="Style.css" rel="stylesheet" type="text/css">
    <script src="ChangeTem.js"></script>
</head>

    <body onload="SetTheme()">
            <header>
                <input type="submit" value="Change tema" class="bt" name="tema" onclick="ChangeTema()">   
            </header>
            <nav>
                <a href="registr.php">Regestration</a>
            </nav>
            <main>
                <form name="reg" action="#" method="get">
                    <div class="inp">
                        <label for="name">Name:</label>
                        <input type="text" id="name" oninput="SaveText(this)" class="in" name="name">
                        <label for="pass">Password:</label>
                        <input type="password" id="pass" oninput="SaveText(this)" class="in" name="pass">
                    </div>
                    <div class="btns">
                        <input type="submit" value="Log in" class="bt" name="LogIn">
                    </div>
                </form>
            </main>
            <footer>

            </footer>
    </body>
</html>

