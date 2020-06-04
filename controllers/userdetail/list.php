<?php   
    $xtp = new XTemplate("views/userdetail/list.html");
    if(isset($_SESSION['cus_signin_email'])){
        $sql = "SELECT * FROM tblcustomers
                WHERE cus_email = '{$_SESSION['cus_signin_email']}';
        ";
        $tbl = $db->fetchAll($sql);  
        $pwd = '';
        foreach($tbl as $r){
            $xtp->assign('CARD',$r);
            $pwd = $r['cus_password'];
        }  

        $pwd = sha1($pwd);
        $pwd = "{$pwd}{$salt}";
        $xtp->assign('password',$pwd);
        if($_POST){
            $address = $_POST['cus_address'];
            $sql = "INSERT INTO tblcustomers(cus_address) VALUES ('{$address}') WHERE cus_email = '{$_SESSION['cus_signin_email']}' ";
            $sql1 = "UPDATE tblcustomers SET cus_address = '{$address}' WHERE cus_email = '{$_SESSION['cus_signin_email']}' ";
            if($db->executeSQL($sql) && $db->executeSQL($sql1)){
                $f->redir("?m=userdetail&a=list");
            }
        }
    }
    else{
        $f->redir("login.php");
    }
    $xtp->parse('CARD');
    $acontent = $xtp->text('CARD');