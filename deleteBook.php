<?php

session_start();

require_once "config.php";
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $link->query("DELETE FROM book WHERE book_id=$id") or die($link->error());
    header("location: booklist.php");
}
?>