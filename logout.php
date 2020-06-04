<?php
    include("libs/bootstrap.php");
    $_SESSION['cus_signin_email'] = '';
    $_SESSION['cus_signin_name'] = '';
    session_destroy();
    if($_SESSION['cus_signin_email'] == ''){
        $f->redir("{$baseUrl}?m=home&a=home");
    }
    ?>