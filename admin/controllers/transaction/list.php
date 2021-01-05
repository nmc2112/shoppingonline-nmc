<?php
    $xtp = new XTemplate("views/transaction/list.html");

    $sql = "SELECT * FROM tbltransaction t 
        INNER JOIN tblcustomers c ON c.cus_id = t.cus_id
        ORDER BY t.trans_createdate DESC";
    $tbl = $db->fetchAll($sql);
    $nbr = 1;
    foreach($tbl as $r){
        $xtp->assign('ROW',$r);
        $xtp->assign('nbr',$nbr);
        $xtp->parse('LIST.ROW');
        $nbr++;
    }
    if(count($tbl)==0){
        $xtp->assign('noData','Data Not Found');
    }
    $xtp->parse('LIST');
    $acontent = $xtp->text('LIST');