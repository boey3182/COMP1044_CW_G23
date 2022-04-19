<?php

session_start();

require_once "config.php";
$delerror="";
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql = "SELECT * FROM borrowdetails WHERE book_id = $id";
    $result = $link->query($sql);
    if($result->num_rows>0){
        $link->close();
        $delerror= 2;
        header("location: booklist.php?delete=$delerror");
    }else{
        $link->query("DELETE FROM book WHERE book_id=$id") or die($link->error());
        header("location: booklist.php");
    }
    }

?>
