<?php
    $id = $_GET['id'];
    $sql1 = "DELETE FROM tblproducts WHERE pro_id IN ($id) ;
    ";
    $id = explode(',',$id);
    $sql2 = "SELECT cat_id FROM tblproducts WHERE pro_id= $id[0]";
    $rs = $db->fetchOne($sql2);
    $cat_id = $rs['cat_id'];
    $db->executeSQL($sql1);
    $f->redir("../../product/list&cat_id={$cat_id}/");