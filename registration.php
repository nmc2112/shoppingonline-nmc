<?php
    include("libs/bootstrap.php");
    $xtp = new XTemplate("views/registration.html");
    if($_POST){
        $fname = $_POST['cus_firstname'];
        $lname = $_POST['cus_lastname'];
        $email = $_POST['cus_email'];
        $phone = $_POST['cus_phonenumber'];
        $nation = $_POST['cus_nation'];
        $pw = $_POST['cus_password'];
        $rtpw = $_POST['cus_retypepw'];
        $flag = 1;
        $pw_new = sha1($pw);
        $pw_new_1 = $pw_new."".$salt;
        $status = 0;
        if($rtpw != $pw){
            $flag = 0;
            $rpw_err = 'Your retype password is different';
            $xtp->assign('rpw_err',$rpw_err);
        } 
        if($valid->isEmail($email)==false){
            $flag = 0;
            $email_err = 'Your email type is invalid';
            $xtp->assign('email_err',$email_err);
        } 
        if($valid->isString($fname)==false){
            $flag = 0;
            $fName_err = 'Your first name is invalid';
            $xtp->assign('fname_err',$fName_err);
        } 
        if($valid->isString($nation)==false){
            $flag = 0;
            $nation_err = 'Your nation name is invalid';
            $xtp->assign('nation_err',$nation_err);
        } 
        if($valid->isString($lname)==false){
            $flag = 0;
            $lName_err = 'Your last name is invalid';
            $xtp->assign('lname_err',$lName_err);
        } 
        if($db->checkExisted('tblcustomers',$email,'cus_email')=='NO'){
            $flag = 0;
            ?><script>alert("Your email has been used")</script><?php
        }
        if($flag == 1){
            $sql = "INSERT INTO tblcustomers(cus_firstname,cus_lastname,cus_email,cus_password,cus_status,cus_phonenumber,cus_nation)
                    VALUES ('{$fname}','{$lname}','{$email}','{$pw_new_1}','{$status}','{$phone}','{$nation}');
            ";
            if($db->executeSQL($sql)){
                header("Location:login.php");
            }
        }

        
    }
        
    $xtp->parse('REGIS');
    $xtp->out('REGIS');