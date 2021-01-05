<?php
    $xtp = new XTemplate('views/wishlist.html');
    if(isset($_GET['id'])){
        $ids = explode(',',$_GET['id']);
        for($i = 0; $i < count($ids); $i++){
            if(in_array($ids[$i],$_SESSION['customer_wish_list'])) continue;
            array_push($_SESSION['customer_wish_list'],$ids[$i]);
        }
        $page = $_GET['page'];
        $f->redir("product/".$page."");
    }
    if($_SESSION['cus_signin_email'] == ''){
        $f->redir('login.php');
    }
    $arr = implode(',',$_SESSION['customer_wish_list']);
    $sql = "SELECT * FROM tblproducts WHERE pro_id IN ({$arr})";
    $tbl = $db->fetchAll($sql);
    foreach($tbl as $r){
        $xtp->assign('LIST',$r);
        $xtp->parse('WISH.LIST');
    }
    $xtp->parse('WISH');
    $acontent = $xtp->text('WISH');