<?php
    $xtp = new XTemplate("views/checkout/list.html");
   
    require 'vendor/autoload.php';
    \Stripe\Stripe::setApiKey('sk_test_88ouotIhch2F5RMEGFxGya8d00FtNvamqT');

    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $email = $POST['cus_email'];
    $address = $POST['cus_address'];
    $token = $POST['stripeToken'];
    $product = '';

    $count = count($_SESSION['cartlist']);
    for($i=0; $i<$count; $i++){
        $id = $i;
        $qty = $_SESSION['cartlist'][$i]['qty'];

        $sql = "SELECT p.*,c.* FROM tblproducts p 
                INNER JOIN tblcategories c ON c.cat_id = p.cat_id
                WHERE pro_id = '{$_SESSION['cartlist'][$i]['id']}'";
        $tbl = $db->fetchOne($sql);
        $pro_total = $qty * intval($tbl['pro_price']);

        $product .= $qty." x ".$tbl['pro_name']." $".$pro_total."<br>";
    }


    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source' => $token
    ]);

    $_SESSION['cus_totalBill'] = $_SESSION['cus_totalBill'] * 100;
    $charge = \Stripe\Charge::create(array(
        'amount' => $_SESSION['cus_totalBill'],
        'currency' => 'usd',
        'description' => $product,
        'customer' => $customer->id
    ));

    $amount_insert = $_SESSION['cus_totalBill']/100;

    $sql = "INSERT INTO tbltransaction(trans_id,cus_id,trans_product,trans_amount,trans_currency,trans_status,trans_address)
    VALUES('{$charge->id}','{$_SESSION["cus_signin_id"]}','{$charge->description}','{$amount_insert}','{$charge->currency}','{$charge->status}','{$address}')";
    
    
    if($db->executeSQL($sql)){
        $f->redir("../succeed&id=".$charge->id);
    }
    $xtp->parse('LIST');
    $acontent = $xtp->text('LIST');