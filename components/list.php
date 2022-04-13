<?php
    require('bd_users.php');

    $S = "select * from list";
    $res = mysqli_query($con, $S);

    session_start();
    if (!empty($_SESSION["login"]))
    {
        if(isset($_REQUEST["sb_exit"]))
        {
            session_unset();
            session_destroy();
            header("Location:  /List/main.php");
        }
?>
<main>
    <form>
        <div>
            <input type="submit" name="sb_exit" class="btn" value="Log out">
        </div>
    </form>
    <form>
        <div class="inp">
            <label for="delo">Create new point:</label>
            <input type="text" name="delo" id="delo" class="in" required>
            <input type="submit" name="Reg" class="btn" value="Add">
        </div>

        <table border = 1>
        <tr>
            <td class="Cell"> №</td>
            <td class="Cell"> Title</td>
            <td class="Cell"> Delete</td>
            <td class="Cell"> Change</td>
        </tr>
    <?php
        $Count = 0;
        while($row = mysqli_fetch_row($res))
        {
            if($row[2] == $_SESSION["login"]) 
            {
                $Count++;
                print("<tr>");
                print("<td >$Count</td>");
                print("<td >$row[1]</td>");
                print("<td ><a href='delete.php?id=".$row[0]."'>click</td>");
                print("<td ><a href='update.php?id=".$row[0]."'>click</td>");
                print("</tr>");
            }
        }
    ?>
    </form>
</main>
<?php
    }
    else{
        header("Location: /List/main.php");
    }
    if(isset($_GET['Reg'])){
        $delo=$_REQUEST['delo'];
        $Author = $_SESSION["login"];
        echo print("$Author");
        $S="INSERT INTO `list`(`id`, `name`, `author`) VALUES (NULL,'$delo', '$Author')";
        mysqli_query($con, $S) or die("Error!");
    
        header('Location: /List/index.php');
    }
?>
