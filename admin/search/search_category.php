<?php
    include("../../libs/bootstrap.php");
    
    
    if(isset($_GET['query'])){
        $keyword = $_GET['query'];
        $sql = "SELECT * FROM tblcategories WHERE cat_name LIKE '%{$keyword}%' OR cat_id LIKE '%{$keyword}%' ORDER BY cat_id";
    }
    else{
        $sql = "SELECT * FROM tblcategories ORDER BY cat_id ";
    }
    $table = $db->fetchAll($sql);
    $output='<br>';
    if(count($table)>0){
        $output .= '
            <div class="table-responsive">
            <table class="table table bordered">
                <tr>
                    <th width="15%">Category ID</th>
                    <th>Category Name</th>
                    <th width="20%" colspan="2">Action</th>
                </tr>
            ';
        foreach($table as $row){
            $output .= '
                <tr>
                    <td>'.$row["cat_id"].'</td>
                    <td><a style="color: rgb(19, 41, 165) ;" href="../../product/list&cat_id='.$row["cat_id"].'/">'.$row["cat_name"].'</td>
                   
                    <td>
                        <button type="button" data-value='.$row["cat_name"].'  data-id='.$row["cat_id"].' id="btnEdit" data-toggle="modal" data-target="#editcat"  class="tabledit-edit-button btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                    </td>
                    <td>
                        <button data-id='.$row["cat_id"].' type="button" id="btnDelete"class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></td>
                    </td>
                </tr>
                ';
        }
        echo $output;
    }
    else{
        echo '<br><br><br><br>Data Not Found';
    }