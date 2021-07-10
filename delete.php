<?php include_once("include/session.php"); ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="contentbox" >
    <script type="text/javascript">
        function countdown() {
            var i = document.getElementById('timecount');
            if (parseInt(i.innerHTML)<=1) {
                location.href = 'dashboard.php.php';
            }
            i.innerHTML = parseInt(i.innerHTML)-1;
        }
        setInterval(function(){ countdown(); },1000);
    </script>
    <?php
    $id=$row;
    $sql="DELETE FROM users WHERE ID='$id'";
    $result=mysqli_query($con,$sql);
//    $sql="DELETE FROM `wallet` WHERE ID='$id'";
//    $result=mysqli_query($con,$sql);
//    $sql="DELETE FROM `deposit` WHERE ID='$id'";
//    $result=mysqli_query($con,$sql);
    if($result){
        echo " <div align='center'>";
        echo "Account Deleted Sucessfully.";
        echo " <a href='users.php' >Click here</a> to go back. ";
        echo "</div> ";
    } elseif(!isset($id) || $id==NULL) {
        print "
                    <script language='javascript'>
                        window.location = 'users.php';
                    </script>
                    ";
    } else {
        echo "Unable to delete Your Account";
    }
    ?>
</div>
</body>
</html>
</div>