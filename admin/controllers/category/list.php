<?php
    $xtp = new XTemplate('views/category/list.html');
    if($_POST){
        $cat_name = $_POST['cat_name_added'];
        $sql = "SELECT cat_name FROM tblcategories WHERE cat_name = '{$cat_name}'";
        $rsult = $db->fetchOne($sql);
        if($rsult['cat_name']==''){
            $sql = "INSERT INTO tblcategories(cat_name) VALUES ('$cat_name')";
            if($db->executeSQL($sql)){
                $f->redir("../../category/list/");
            }
        }
        else{
            ?><script>alert("This category name has already existed");</script><?php
        }
    }
    $xtp->parse('LS');
    $acontent = $xtp->text('LS');