<?php
    include("../../libs/bootstrap.php");
    
    
    if(isset($_GET['query'])){
        $keyword = $_GET['query'];
        $sql = "SELECT *,  
        CASE WHEN cus_status=0 THEN 'Active' 
        WHEN cus_status=1 THEN 'Deactive' 
        END as cus_status_name
        FROM tblcustomers 
        WHERE (cus_firstname LIKE '%{$keyword}%')
        OR (cus_lastname LIKE '%{$keyword}%')
        OR (cus_email LIKE '%{$keyword}%')
        OR (cus_id LIKE '%{$keyword}%')";
        $table = $db->fetchAll($sql);
    }
    else{
        $sql = "SELECT *,
        CASE WHEN c.cus_status=0 THEN 'Active' 
        WHEN c.cus_status=1 THEN 'Deactive' 
        END as cus_status_name
        FROM tblcustomers as c
        ORDER BY c.cus_id
        LIMIT 0,20
        ";
        $table = $db->fetchAll($sql);
    }
    $output='<br><br><br><br>';
    if(count($table)>0){
        $output .= '
            <div class="table-responsive">
            <table class="table table bordered">
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th width="30%">Email</th>
                    <th>Nation</th>
                    <th>Phone</th>
                    <th>Transaction History</th>
                    <th>Action</th>                            
                </tr>
            ';
        foreach($table as $row){
            $output .= '
                <tr>
                    <td>'.$row["cus_id"].'</td>
                    <td>'.$row["cus_firstname"].'</td>
                    <td>'.$row["cus_lastname"].'</td>
                    <td>'.$row["cus_email"].'</td>
                    <td>'.$row["cus_nation"].'</td>
                    <td>'.$row["cus_phonenumber"].'</td>
                    <td><a href="../../customers/transactionlist&id='.$row["cus_id"].'/">List</a></td>
                    <td><a href="../../customers/'.$row["cus_status_name"].'&id='.$row['cus_id'].'/">'.$row["cus_status_name"].'</a></td>
                </tr>
                ';
        }
        echo $output;
    }
    else{
        echo '<br><br><br><br>Data Not Found';
    }

    