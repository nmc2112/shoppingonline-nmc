<?php
    include("../libs/bootstrap.php");
    if($_SESSION['admin_signin_email']==''){
        $f->redir("{$baseUrl}admin/login/");
    }
    else{
        $axtp = new XTemplate('views/layout.html');
        $m = $_GET['m'];
        $a = $_GET['a'];
        if(file_exists("controllers/{$m}/{$a}.php")){
            include("controllers/{$m}/{$a}.php");
        }else{
            $acontent = '404 Not found Module/Action';
        }
        $arr = explode(' ',$_SESSION['admin_signin_name']);
        $count = count($arr);
        $axtp->assign('user',$arr[$count-1]);
        $axtp->assign('content',$acontent);
        $axtp->assign('category',$m);
        $axtp->parse('LAYOUT');
        $axtp->out('LAYOUT');
        }