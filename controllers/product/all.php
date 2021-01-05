<?php
    $xtp = new XTemplate("views/product/all.html");
    if(isset($_GET['view'])){
        $xtp->assign('view',$_GET['view']);
        $view = $_GET['view'];
    }
    else $view = 'htl';
    if($view == 'htl') {
        $sql = "SELECT * FROM tblproducts ORDER BY pro_price DESC;";
        $sql6 = "SELECT * FROM tblproducts WHERE cat_id = 6 ORDER BY pro_price DESC;";
        $sql7 = "SELECT * FROM tblproducts WHERE cat_id = 7 ORDER BY pro_price DESC;";
        $sql8 = "SELECT * FROM tblproducts WHERE cat_id = 8 ORDER BY pro_price DESC;";
        $sql9 = "SELECT * FROM tblproducts WHERE cat_id = 9 ORDER BY pro_price DESC;";
        $sql10 = "SELECT * FROM tblproducts WHERE cat_id = 10 ORDER BY pro_price DESC;";
    }
    if($view == 'lth') {
        $sql = "SELECT * FROM tblproducts ORDER BY pro_price ASC;";
        $sql6 = "SELECT * FROM tblproducts WHERE cat_id = 6 ORDER BY pro_price ASC;";
        $sql7 = "SELECT * FROM tblproducts WHERE cat_id = 7 ORDER BY pro_price ASC;";
        $sql8 = "SELECT * FROM tblproducts WHERE cat_id = 8 ORDER BY pro_price ASC;";
        $sql9 = "SELECT * FROM tblproducts WHERE cat_id = 9 ORDER BY pro_price ASC;";
        $sql10 = "SELECT * FROM tblproducts WHERE cat_id = 10 ORDER BY pro_price ASC;";
    }
    $tbl = $db->fetchAll($sql);
    $tbl6 = $db->fetchAll($sql6);
    $tbl7 = $db->fetchAll($sql7);
    $tbl8 = $db->fetchAll($sql8);
    $tbl9 = $db->fetchAll($sql9);
    $tbl10 = $db->fetchAll($sql10);
    foreach($tbl as $r){
        $xtp->assign('ALL',$r);
        $xtp->parse('PRODUCT.ALL');
    }
    foreach($tbl6 as $r){
        $xtp->assign('MAC',$r);
        $xtp->parse('PRODUCT.MAC');
    }
    foreach($tbl7 as $r){
        $xtp->assign('IPAD',$r);
        $xtp->parse('PRODUCT.IPAD');
    }
    foreach($tbl8 as $r){
        $xtp->assign('IPHONE',$r);
        $xtp->parse('PRODUCT.IPHONE');
    }
    foreach($tbl9 as $r){
        $xtp->assign('ACCESS',$r);
        $xtp->parse('PRODUCT.ACCESS');
    }
    foreach($tbl10 as $r){
        $xtp->assign('TV',$r);
        $xtp->parse('PRODUCT.TV');
    }
    $xtp->parse('PRODUCT');
    $acontent = $xtp->text('PRODUCT');