<?php
require_once "config.php";
$sql = "SELECT * FROM borrow LEFT JOIN borrowdetails using (borrow_id)";
$result = $link->query($sql);
$link->close();
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Borrow Details List</title>
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
<h1>Borrow Details List</h1>
</div>

<input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Options</header>

      <a href="welcome.php">
        <i class="fas fa-home"></i>
        <span>Homepage</span>
      </a>

    </div>
    <section>
        <table>
            <br>
            <tr>
                <th>borrow_id</th>
                <th>member_id</th>
                <th>date_borrow</th>
                <th>due_date</th>
                <th>borrow_details_id</th>
                <th>book_id</th>
                <th>borrow_status</th>
                <th>date_return</th>
                <th>Edit Option</th>


            </tr>

            <?php   
                while($rows=$result->fetch_assoc())
                {
                   
             ?>
            <tr>

                <td><?php echo $rows['borrow_id'];?></td>
                <td><?php echo $rows['member_id'];?></td>
                <td><?php echo $rows['date_borrow'];?></td>
                <td><?php echo $rows['due_date'];?></td>
                <td><?php echo $rows['borrow_details_id'];?></td>
                <td><?php echo $rows['book_id'];?></td>
                <td><?php echo $rows['borrow_status'];?></td>
                <td><?php echo $rows['date_return'];?></td>
                <td>
                <a href="updateborrowdetails.php?edit=<?php echo $rows['borrow_id'];?>"
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