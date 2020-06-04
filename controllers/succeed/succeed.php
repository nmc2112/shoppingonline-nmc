<?php
$xtp = new XTemplate("views/succeed/succeed.html");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $xtp->assign('billID',$id);
    $_SESSION['cartlist'] = array();
    $sql = "UPDATE tblproducts SET pro_cusquantity = 0";
    $sql1 = "UPDATE tblproducts SET pro_total = 0 ";
    $db->executeSQL($sql);
    $db->executeSQL($sql1);
}
else $f->redir("?m=cart&a=list");
$xtp->parse('SUCCEED');
$acontent = $xtp->text('SUCCEED');