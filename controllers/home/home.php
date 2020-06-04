<?php
    $xtp = new XTemplate("views/home/home.html");
    $sql = "SELECT p.*,c.* FROM tblproducts p
            LEFT JOIN tblcategories c
            ON p.cat_id =c.cat_id 
            WHERE c.cat_name = 'Apple'
            ORDER BY pro_time
            ";
    $tbl = $db->fetchAll($sql);
    foreach($tbl as $r){
        $xtp->assign('APPLE',$r);
        $xtp->parse('HOME.APPLE');
    }
    $sql = "SELECT p.*,c.* FROM tblproducts p
            LEFT JOIN tblcategories c
            ON p.cat_id =c.cat_id 
            WHERE c.cat_name = 'Samsung'
            ORDER BY pro_time
            LIMIT 0,6
            ";
    $tbl = $db->fetchAll($sql);
    foreach($tbl as $r){
        $xtp->assign('SAMSUNG',$r);
        $xtp->parse('HOME.SAMSUNG');
    }
    $xtp->parse('HOME');
    $acontent = $xtp->text('HOME');
?>