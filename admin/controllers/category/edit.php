<?php
    $id = $_GET['id']; 
    $newCat = $_GET['cat_name'];
    $sql = "UPDATE tblcategories SET cat_name = '{$newCat}' WHERE cat_id={$id}";
    if($db->executeSQL($sql)){
        $f->redir("../../category/list/");
    }
    
   