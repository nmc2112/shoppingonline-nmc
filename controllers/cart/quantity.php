<?php
    $id = $_GET['id']; 
    $newQty = $_GET['pro_cusquantity'];
    $_SESSION['cartlist'][$id]['qty'] = $newQty;
    /* $sql = "UPDATE tblproducts SET pro_cusquantity = {$newQty} WHERE pro_id={$id}";
    if($db->executeSQL($sql)){
        
    } */
    $f->redir("?m=cart&a=list");