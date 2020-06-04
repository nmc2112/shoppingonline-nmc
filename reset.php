<?php
    include("libs/bootstrap.php");
    
    
    include("PHPMailer-master/src/Exception.php");
    include("PHPMailer-master/src/OAuth.php");
    include("PHPMailer-master/src/PHPMailer.php");
    include("PHPMailer-master/src/POP3.php");
    include("PHPMailer-master/src/SMTP.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $axtp = new XTemplate("views/reset.html");
    if($_POST){
        $_SESSION['cus_signin_email']='';
        $email = $_POST['cus_email'];
        $sql = "SELECT * FROM tblcustomers WHERE cus_email = '{$email}'";
        $rs = $db->fetchAll($sql);
        foreach($rs as $row){
            $id = $row['cus_id'];
        }
        if(count($rs)>0){
                $_SESSION['cus_signin_email']=$email;
                $mail = new PHPMailer;
                $mail->IsSMTP(); 
                $mail->SMTPDebug = 3; 
                $mail->SMTPAuth = true; 
                $mail->SMTPSecure = 'tls';
                $mail->Host = "smtp.gmail.com";
                $mail->Port = "587"; 
                $mail->IsHTML(true);
                $mail->Username = "nmcshoppingonline@gmail.com";
                $mail->Password = "71doicung";
                $mail->setFrom('nmcshoppingonline@gmail.com', 'Chau');

                $mail->addAddress($email);
                $mail->Subject = 'Your OTP';
                $otp = rand(100000,999999);
                $sql = "UPDATE tblcustomers SET cus_otp = '{$otp}' WHERE cus_id = '{$id}'";
                $db->executeSQL($sql);
                $mail->Body = $otp;
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    echo "Message sent!"; 
                    $f->redir("emailOTP.php?id=$id");
                }
        }
        else{
            ?><script>alert("Your email does not exist")</script><?php
        }

    }
    $axtp->parse('RESET');
    $axtp->out('RESET');