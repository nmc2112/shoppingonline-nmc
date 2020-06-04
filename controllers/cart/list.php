<?php
    $xtp = new XTemplate("views/cart/list.html");
    $totalPrice = 0;
    $nbr=1;
    $tax=0;
    if(!empty($_SESSION['cartlist'])){
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
            $xtp->assign('CARTLIST',$tbl);
            $xtp->assign('nbr',$nbr);
            $xtp->parse('LIST.CARTLIST');
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
        $_SESSION['cus_totalBill'] = $totalPrice+$tax;
    }
    $xtp->parse('LIST');
    $acontent = $xtp->text('LIST');