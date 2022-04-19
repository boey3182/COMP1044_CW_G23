<?php
require_once "config.php";
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql ="SELECT * FROM borrow WHERE member_id=$id";
    $result= $link->query($sql);
    if($result->num_rows>0){
        $link->close();
        $delerror=2;
        header("location: memberlist.php?delete=$delerror");
    }
    else
    {
    $link->query("DELETE FROM member WHERE member_id=$id") or die($link->error());
    header("location: memberlist.php");
    }
}
?>
