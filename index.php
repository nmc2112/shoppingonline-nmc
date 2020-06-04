<?php   
    include("libs/bootstrap.php");
    $axtp = new XTemplate("views/layout.html");
    $m = $_GET['m'];
    $a = $_GET['a'];
    if(file_exists("controllers/{$m}/{$a}.php")){
        include("controllers/{$m}/{$a}.php");
    }else{
        $acontent = '404 Not found Module/Action';
    }
    if(!isset($_SESSION['cartlist'])) {
        $count=0;
        $_SESSION['cartlist'] = array();
    }
    else{
        $count = count($_SESSION['cartlist']);
    }
    $axtp->assign('totalCount',$count);
    $axtp->assign('content',$acontent);
    $axtp->parse('LAYOUT');
    $axtp->out('LAYOUT');


?>