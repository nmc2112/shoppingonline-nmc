<?php
    $xtp = new XTemplate("views/home.html");
    $sql = "SELECT * FROM tblproducts ORDER BY pro_time";
    $tbl = $db->fetchAll($sql);
    
    $sql1 = "SELECT * FROM tblproducts";
    $tbl1 = $db->fetchAll($sql1);
    $cnt = 1;
    foreach($tbl as $r){
        $xtp->assign('NEW',$r);
        $xtp->parse('HOME.NEW');
        if($cnt == 3) break;
        $cnt++;
    }
    $cnt = 1;
    foreach($tbl1 as $r){
        $xtp->assign('POPULAR',$r);
        $xtp->parse('HOME.POPULAR');
        if($cnt == 6) break;
        $cnt++;
    }
    $xtp->parse('HOME');
    $acontent = $xtp->text('HOME');
?>