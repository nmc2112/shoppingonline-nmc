<?php
    $id = $_GET['id'];
    array_splice($_SESSION['cartlist'],$id, 1); 
    $f->redir("../cart/list");