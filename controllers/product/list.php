<?php
    $xtp = new XTemplate("views/product/list.html");
    $flag=0;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $xtp->assign('id',$id);
        $sql = "SELECT p.*,c.* FROM tblproducts p
                LEFT JOIN tblcategories c ON c.cat_id = p.cat_id
                WHERE pro_id = '{$id}'";
        $tbl = $db->fetchAll($sql);
        foreach($tbl as $r){
            $xtp->assign('LIST',$r);
        }
    }
    else $f->redir("?m=home&a=home");    
        
    if($_POST){
        $count = count($_SESSION['cartlist']);
        for($i=0; $i<$count; $i++){
            if($_SESSION['cartlist'][$i]['id']==$id){
                ?><script> alert("You have added this product!");</script><?php
                $flag=1;
                break;
            }
        }
        if($flag==0){
            array_push($_SESSION['cartlist'],array('id'=>$id,'qty'=>1));    
            $f->redir("?m=cart&a=list");
        }
    }

    $xtp->parse('LIST');
    $acontent = $xtp->text('LIST');