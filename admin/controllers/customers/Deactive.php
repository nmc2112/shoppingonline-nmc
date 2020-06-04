<?php
    if($_GET['id']) $id = $_GET['id'];
    $sql = "UPDATE tblCustomers SET cus_status = 0 WHERE cus_id = '{$id}'";
    if($db->executeSQL($sql)){
        $f->redir("../../customers/list/");
    }