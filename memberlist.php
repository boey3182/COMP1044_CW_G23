<?php
require_once "config.php";

if(isset($_POST['search'])){
   $search = $_POST['search'];
   $sql1="SELECT * FROM `member` WHERE `member_id` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `lastname` LIKE '%$search%' OR`gender` LIKE '%$search%' OR `address` LIKE '%$search%' OR `contact` LIKE '%$search%' OR `year_level` LIKE '%$search%' OR`status` LIKE '%$search%' OR `type_id` LIKE '%$search%';";
   $result =$link->query($sql1);
}else
{
$sql = "SELECT * FROM member ORDER BY member_id ASC ";
$result = $link->query($sql);
}
$link->close();

?>



<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Member List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
        p1{
            text-align=center;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        p2
        {
            text-align=center;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>
  
<body>
<div class="header">
<h1>Member List</h1>
<form action="memberlist.php" method="post" name="search">
  <input type="search" placeholder="Search a Member ..." name="search">
  <i class="fa fa-search"></i>
</form>
</div>

<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Options</header>
        <a href="addMember.php">
        <i class="fas fa-plus"></i>
        <span>Add a Member</span>
      </a>

      <a href="welcome.php">
        <i class="fas fa-home"></i>
        <span>Homepage</span>
      </a>

    </div>
    <section>
        <table>
            <br>
            <tr>
                <th>member_id</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>gender</th>
                <th>address</th>
                <th>contact</th>
                <th>year_level</th>
                <th>status</th>
                <th>type_id</th>
                <th>Delete Option</th>
                <th>Edit Option</th>

            </tr>

            <?php   
                while($rows=$result->fetch_assoc())
                {
                   
             ?>
            <tr>

                <td><?php echo $rows['member_id'];?></td>
                <td><?php echo $rows['firstname'];?></td>
                <td><?php echo $rows['lastname'];?></td>
                <td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['address'];?></td>
                <td><?php echo $rows['contact'];?></td>
                <td><?php echo $rows['year_level'];?></td>
                <td><?php echo $rows['status'];?></td>
                <td><?php echo $rows['type_id'];?></td>
                <td>
                    <a href="deleteMember.php?delete=<?php echo $rows['member_id'];?>"
                     class="btn btn-danger">Delete</a>
                </td>
                <td>
                    
                <a href="updateMember.php?edit=<?php echo $rows['member_id'];?>"
                     class="btn btn-info">Edit</a>
                </td>
            </tr>
            <?php
                }
             ?>
        </table>
        <br>
    </section>
</body>
  
</html>