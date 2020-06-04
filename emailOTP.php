<?php
    include("libs/bootstrap.php");
    $axtp = new XTemplate("views/emailOTP.html");
    if($_GET['id']) $id = $_GET['id'];
    if($_POST){
        $cus_otp = $_POST['cus_code'];
        $sql = "SELECT cus_otp FROM tblcustomers WHERE cus_id = '{$id}'";
        $rs = $db->fetchAll($sql);
        foreach($rs as $row){
            $otp = $row['cus_otp'];
        }
        if($otp != $cus_otp){
            ?><script>alert("Your OTP Code is invalid")</script><?php
        }
        else{
            $otp = rand(100000,999999); 
            $sql1 = "UPDATE tblcustomers SET cus_otp = '{$otp}' WHERE cus_id = '{$id}'";
            $db->executeSQL($sql1);
            $f->redir("resetPassword.php?id={$id}");
        }
    }
    $axtp->parse('VERIFY');
    $axtp->out('VERIFY');