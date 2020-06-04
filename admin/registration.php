<?php
    include("../libs/bootstrap.php");
    $axtp = new XTemplate("views/registration.html");
    if($_POST){
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $pw = $_POST['user_password'];
        $rtpw = $_POST['user_retype_password'];
        $flag = 1;
        $pw_new = sha1($pw);
        $pw_new_1 = $pw_new."".$salt;
        if($db->checkExisted('tblusers',$email,'user_email')=='NO'){
            $flag = 0;
            ?><script>alert("Your email has been used")</script><?php
        }
        if($rtpw != $pw){
            $flag = 0;
        } 
        if($flag == 1){
            $sql = "INSERT INTO tblusers(user_name,user_email,user_password)
                    VALUES ('{$name}','{$email}','{$pw_new_1}');
            ";
            if($db->executeSQL($sql)){
                header("Location:login.php");
            }
        }

        
    }
        
    $axtp->parse('REGISTER');
    $axtp->out('REGISTER');