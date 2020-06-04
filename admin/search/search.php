<?php
    include("../../libs/bootstrap.php");

    
    if(isset($_GET['query'])){
        $keyword = $_GET['query'];
        
        $tbl1 = 'tblproducts';  
        $tbl2 = 'tblcategories';
        $column_name = 'pro_name';
        $column_brand = 'cat_name';
        $column_id = 'cat_id';
        $condition = "1=1";     
        $arr = explode(' ',$keyword);
        foreach($arr as $value){
            $condition .= " AND ($column_name LIKE '%{$value}%'
            OR $column_brand LIKE '%{$value}%'
            OR pro_id LIKE '%{$keyword}%'
            ) ";
        }
        $table = $db->searchExisted($tbl1,$tbl2,$column_name,$column_brand,$column_id,$condition);
    }
    else{
        $sql = "SELECT p.*,c.* FROM tblproducts p
                INNER JOIN tblcategories c ON c.cat_id = p.cat_id
                ORDER BY pro_id 
        ";
        $table = $db->fetchAll($sql);
    }
    $output='<br><br><br><br>';
    if(count($table)>0){
        $output .= '
            <div class="table-responsive">
            <table class="table table bordered">
                <tr>
                    <th>Product ID</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            ';
        foreach($table as $row){
            $output .= '
                <tr>
                    <td>'.$row["pro_id"].'</td>
                    <td>'.$row["cat_name"].'</td>
                    <th><a style="color: rgb(19, 41, 165) ;" href="../../product/edit&cat_id='.$row["cat_id"].'&id='.$row["pro_id"].'/">'.$row["pro_name"].'</th>
                    <td>$'.$row["pro_price"].'</td>
                    <td>'.$row["pro_quantity"].'</td>
                </tr>
                ';
        }
        echo $output;
    }
    else{
        echo '<br><br><br><br>Data Not Found';
    }

