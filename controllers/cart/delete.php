<?php
    $id = $_GET['id'];
    array_splice($_SESSION['cartlist'],$id, 1); 
    $f->redir("?m=cart&a=list");