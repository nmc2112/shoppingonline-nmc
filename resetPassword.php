<?php
    include("libs/bootstrap.php");    
    if($_SESSION['cus_signin_email']==''){
        $f->redir("login.php");
    }
    $axtp = new XTemplate("views/resetPassword.html");
    if($_GET['id']) $id = $_GET['id'];
    if($_POST){
        $pw = $_POST['cus_password'];
        $rtpw = $_POST['cus_rtpassword'];
        $pw_new = sha1($pw);
        $pw_new_1 = $pw_new."".$salt;
        if($rtpw!=$pw){
            ?><script>alert("Your retype password is incorrect")</script><?php
        }
        else{
            $sql = "UPDATE tblcustomers SET cus_password = '{$pw_new_1}'
            WHERE cus_id = {$id};
            ";
            if($db->executeSQL($sql)){
                $_SESSION['cus_signin_email'] = '';
                session_destroy();
                if($_SESSION['cus_signin_email'] == ''){
                    header("Location:login.php");
                }
            }

        }
    }
    $axtp->parse('RESETPW');
    $axtp->out('RESETPW');