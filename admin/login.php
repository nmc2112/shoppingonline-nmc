<?php
    include("../libs/bootstrap.php");
    $axtp = new XTemplate("views/login.html");
    $_SESSION['admin_signin_email']='';
    $do_login = 0;
    if($_POST){
        $email = $_POST['user_email'];
        $pwd = $_POST['user_password'];
        $sql = "SELECT u.*FROM tblusers u
        ";
        $rsUser = $db->fetchAll($sql);
        if($email=='' || $pwd ==''){
            ?><script>alert("You have not typed email or password")</script><?php
        }
        if(count($rsUser)>0){
            $pwd = sha1($pwd);
            $pwd = "{$pwd}{$salt}";
            foreach($rsUser as $r){
                if($r['user_email']==$email && $r['user_password']==$pwd){
                    $ruleList = $r['rul_action'];
                    
                    $_SESSION['admin_signin_email']=$email;
                    $_SESSION['admin_signin_name']=$r['user_name'];
                    
                    $do_login = 1;
                    break;
                }
            }
        }
        if($do_login==0){
            ?><script>alert("Your email or password is invalid")</script><?php
        }
        if(strlen($_SESSION['admin_signin_email'])>0){
            $f->redir("../search/listsearch/");
        }
    }
    $axtp->parse('LOGIN');
    $axtp->out('LOGIN');