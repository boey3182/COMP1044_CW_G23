<?php
require_once "config.php";
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $link->query("DELETE FROM member WHERE member_id=$id") or die($link->error());

    header("location: memberlist.php");
}
?>