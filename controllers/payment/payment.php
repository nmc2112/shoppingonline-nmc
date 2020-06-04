<?php
    $xtp = new XTemplate("views/payment/payment.html");

    if($_SESSION['cus_signin_email']==''){
        $f->redir("login.php");
    }
    if($_SESSION['cus_totalBill']==0){
        $f->redir("?m=cart&a=list");
    }

    $sql = "SELECT * FROM tblcustomers
            WHERE cus_email = '{$_SESSION['cus_signin_email']}';
    ";
    $tbl = $db->fetchAll($sql);  
    foreach($tbl as $r){
        $xtp->assign('PAYMENT',$r);
    }  
    if($_POST){
        $address = $_POST['cus_address'];
    }


    $totalPrice = 0;
    $nbr=1;
    if(isset($_SESSION['cartlist'])){
        $count = count($_SESSION['cartlist']);
        for($i=0; $i<$count; $i++){
            $id = $i;
            $qty = $_SESSION['cartlist'][$i]['qty'];

            $sql = "SELECT p.*,c.* FROM tblproducts p 
                    INNER JOIN tblcategories c ON c.cat_id = p.cat_id
                    WHERE pro_id = '{$_SESSION['cartlist'][$i]['id']}'";
            $tbl = $db->fetchOne($sql);

            $total = $qty*$tbl['pro_price'];
            $xtp->assign('total',$total);
            $xtp->assign('id',$id);
            $xtp->assign('qty',$qty);
            $xtp->assign('LIST',$tbl);
            $xtp->assign('nbr',$nbr);
            $xtp->parse('PAYMENT.LIST');
            $nbr++; 

            $totalPrice += $total;
            $tax = $totalPrice * 5/100;
        }


        if($count==0){
            $xtp->assign('warning','Your cart is still empty!');
        }
        $xtp->assign('total', number_format($totalPrice));
        $xtp->assign('tax', number_format($tax));
        $xtp->assign('totalBill', number_format($totalPrice+$tax));
        $_SESSION['cus_totalBill'] = $totalPrice;
    }

    $xtp->parse('PAYMENT');
    $acontent = $xtp->text('PAYMENT');