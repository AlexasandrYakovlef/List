<?php
    require("components/header.php");
?>
<?php
    require('bd_users.php'); 

    if(isset($_REQUEST['t_id'])){

    if(isset($_REQUEST['Reg']))
    {
        $t_id = $_REQUEST['t_id'];
        $name=$_REQUEST['delo'];
        $S = "UPDATE `list` SET `name`='$name' WHERE `id` = ".$t_id;
        print($S);
        mysqli_query($con, $S);
        header('Location: /List/index.php');
    }

    }
    if (isset($_REQUEST['id']))
    {
        $id = $_REQUEST['id'];
        $D = "select * from `list` WHERE `id` = ".$id;
        $res = mysqli_query($con, $D);
        $asd = mysqli_fetch_row($res);

        print("<form>");
            print('<div class="create">');
                print("<label>Title</label>");
                print('<input hidden type="text" name="t_id" value="'.$id.'" >');
                print('<input type="text" class="in" name="delo" value="'.$asd[1].'">');
                print('<input type="submit" value="Okey" name="Reg" class="btn">');
                print('<input type="submit" value="Cancel" name="Cancel" class="btn">');
            print('</div>');
        print("</form>");
    }

    if(isset($_REQUEST['Cancel'])){
        header('Location: /List/index.php');
    }
?>
<?php
    require("components/footer.php");
?>