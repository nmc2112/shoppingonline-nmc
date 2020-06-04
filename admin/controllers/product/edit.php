<?php
    $xtp = new XTemplate("views/product/edit.html");
    if($_GET['id']){
        $id = $_GET['id'];
    }
    if($_GET['cat_id']){
        $cat_id = $_GET['cat_id'];
        
    }
    $do_save = 1;
    $arrFileType = array('png','jpg','gif','svg','jpeg');
    $urlServer = '../.././img';
    $urlServer_copy = 'img';
    $maxSize    = 10000000;
    $sql = "SELECT * FROM tblproducts WHERE pro_id = '{$id}'";
    $tbl = $db->fetchAll($sql);
    foreach($tbl as $r){
        $xtp->assign('EDIT',$r);
        //$cat_id = $r['cat_id'];
    }
    if($_POST){
        $name = $_POST['pro_name'];
        $price = $_POST['pro_price'];
        $quantity = $_POST['pro_quantity'];
        $img = $_FILES['upload_file_added'];
        $pro_img =$f->uploadFile($img,$urlServer,$urlServer_copy,$arrFileType,$maxSize);
        $pro_name_err_mess = $pro_price_err_mess = $pro_quantity_err_mess = $pro_img_err_mess = '';
        if(empty($name)){
            $pro_name_err_mess='Product Name must be filled';
            $xtp->assign('pro_name_err_mess',$pro_name_err_mess);
            $do_save = 0;
        }
        if(!$valid->isNumber($price)){
            $pro_price_err_mess='Price must be a number';
            $xtp->assign('pro_price_err_mess',$pro_price_err_mess);
            $do_save = 0;
        }
        if(!$valid->isNumber($quantity)){
            $pro_quantity_err_mess='Quantity must be a number';
            $xtp->assign('pro_quantity_err_mess',$pro_quantity_err_mess);
            $do_save = 0;
        }
        if($pro_img=='101'){
            $pro_img_err_mess = 'File type not allow';
            $xtp->assign('pro_img_err_mess',$pro_img_err_mess);
            $do_save=0;
        }
        if($pro_img=='102'){
            echo ($file['size']);
            $do_save=0;
        }
        if($do_save==1){
            $time = time();
            $time=date("Y-m-d",$time);
            $sql1="UPDATE tblproducts SET 
                pro_name = '{$name}',
                pro_price = '{$price}',
                pro_quantity = '{$quantity}',
                pro_img = '{$pro_img}',
                pro_time = '{$time}'
                WHERE pro_id = '{$id}'
            ";
            if($db->executeSQL($sql1)){
                $f->redir("../../product/list&cat_id={$cat_id}/");
            }
        }

    }


    $xtp->parse('EDIT');
    $acontent = $xtp->text('EDIT');


?>