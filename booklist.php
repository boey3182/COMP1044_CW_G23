<?php
require_once "config.php";
$delerror="";
if(isset($_GET['delete'])){
    $delerror=$_GET['delete'];
}


if(isset($_POST['search'])){
   $search = $_POST['search'];
   $sql1="SELECT * FROM `book` WHERE `book_id` LIKE '%$search%' OR `book_title` LIKE '%$search%' OR `category_id` LIKE '%$search%' OR`author` LIKE '%$search%' OR `book_copies` LIKE '%$search%' OR `book_pub` LIKE '%$search%' OR `publisher_name` LIKE '%$search%' OR `isbn` LIKE '%$search%' OR`copyright_year` LIKE '%$search%' OR `date_added` LIKE '%$search%' OR `status` LIKE '%$search%';";
   $result =$link->query($sql1);
}
else
{
$sql = "SELECT * FROM book ORDER BY book_id ASC ";
$result = $link->query($sql);
}

$link->close();
?>



<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Book List</title>
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
<h1>Book List</h1>
<form action="booklist.php" method="post" name="search">
  <input type="search" placeholder="Search your book ..." name="search">
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
        <a href="addBook.php">
        <i class="fas fa-plus"></i>
        <span>Add a Book</span>
      </a>

      <a href="welcome.php">
        <i class="fas fa-home"></i>
        <span>Homepage</span>
      </a>

    </div>

		<?php
			if($delerror==2){
				echo'<span style="color : red">Book cannot be deleted as his borrowdetail still exists</span>';
			}
		?>

    <section>
        <table>
            <br>
            <tr>
                <th>book_id</th>
                <th>book_title</th>
                <th>category_id</th>
                <th>author</th>
                <th>book_copies</th>
                <th>book_pub</th>
                <th>publisher_name</th>
                <th>isbn</th>
                <th>copyright_year</th>
                <th>date_added</th>
                <th>status</th>
                <th>Delete Option</th>

            </tr>

            <?php
                while($rows=$result->fetch_assoc())
                {
                   
             ?>
            <tr>

                <td><?php echo $rows['book_id'];?></td>
                <td><?php echo $rows['book_title'];?></td>
                <td><?php echo $rows['category_id'];?></td>
                <td><?php echo $rows['author'];?></td>
                <td><?php echo $rows['book_copies'];?></td>
                <td><?php echo $rows['book_pub'];?></td>
                <td><?php echo $rows['publisher_name'];?></td>
                <td><?php echo $rows['isbn'];?></td>
                <td><?php echo $rows['copyright_year'];?></td>
                <td><?php echo $rows['date_added'];?></td>
                <td><?php echo $rows['status'];?></td>
                <td>
                    <a href="deletebook.php?delete=<?php echo $rows['book_id'];?>"
                     class="btn btn-danger">Delete</a>
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
