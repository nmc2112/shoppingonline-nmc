<?php
    include("libs/bootstrap.php");
    $axtp = new XTemplate("views/login.html");
    $_SESSION['cus_signin_email']='';
    if($_POST){
        $email = $_POST['cus_email'];
        $pwd = $_POST['cus_password'];
        $sql = "SELECT * FROM tblcustomers";
        $rsUser = $db->fetchAll($sql);
        if($email=='' || $pwd ==''){
            ?><script>alert("You have not typed email or password")</script><?php
        }
        if(count($rsUser)>0){
            $pwd = sha1($pwd);
            $pwd = "{$pwd}{$salt}";
            foreach($rsUser as $r){
                if($r['cus_status']==0){
                    ?><script>alert("Your account has not activated")</script><?php
                    break;
                }
                if($r['cus_email']==$email && $r['cus_password']==$pwd){
                    $_SESSION['cus_signin_email']=$email;
                    $_SESSION['cus_signin_id']=$r['cus_id'];
                    $_SESSION['cus_signin_name']=$r['cus_firstname'];
                    break;
                }
            }
        }
        if(strlen($_SESSION['cus_signin_email'])>0){
            $_SESSION['customer_wish_list'] = array();
            if(isset($_SESSION['cartlist']) && !empty($_SESSION['cartlist'])) $f->redir("{$baseUrl}payment");
            else $f->redir("{$baseUrl}home");
        }
    }
    
    $axtp->parse('LOGIN');
    $axtp->out('LOGIN');