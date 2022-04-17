<?php

require_once "config.php";
$borrow_id='';
$member_id='';
$date_borrow='';
$due_date='';
$borrow_details_id='';
$book_id='';
$borrow_status='';
$date_return='';
$id=0;

if (isset($_GET['edit'])){
    $id= $_GET['edit'];
    $result= $link->query("SELECT * FROM borrow LEFT JOIN borrowdetails using (borrow_id) WHERE borrow_id='$id'") or die($link->error());
    if($result->num_rows>0){
        $row=$result->fetch_array();
        $borrowid=$row['borrow_id'];
        $memberid=$row['member_id'];
          $dateborrow=date("Y-m-d\TH:i:s",strtotime($row['date_borrow']));
        $duedate=$row['due_date'];
        $borrowdetailsid= $row['borrow_details_id'];
        $bookid=$row['book_id'];
        $borrowstatus=$row['borrow_status'];
          $datereturn= date("Y-m-d\TH:i:s",strtotime($row['date_return']));
    }
}

if(isset($_POST['update'])){
  $borrowid=$_POST['borrow_id'];
  $id= $_POST['id'];
  $memberid= $_POST['member_id'];
  $dateborrow=$_POST['date_borrow'];
  $duedate=$_POST['due_date'];
  $borrowdetailsid=$_POST['borrow_details_id'];
  $bookid=$_POST['book_id'];
  $borrowstatus=$_POST['borrow_status'];
  $datereturn= date("Y-m-d\TH:i:s",strtotime($_POST['date_return']));

    $link->query("UPDATE borrow SET member_id='$memberid', date_borrow='$dateborrow',due_date='$duedate' WHERE borrow_id='$id'")
    or die($link->error());

    $link->query("UPDATE borrowdetails SET borrow_status='$borrowstatus' ,book_id='$bookid' ,date_return='$datereturn' WHERE borrow_id='$id'") 
    or die($link->error());
  


   header("location: borrowdetailslist.php");

}
?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


    <title>Edit a Borrow Detail</title>
  </head>
  <body>
  
  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-8">
          <div class="form h-100 contact-wrap p-4">
            <h3 class="text-center">Edit a Borrow Detail</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">

            <input type="hidden" name="id" value="<?php echo $id; ?>">
    
                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Borrow ID:</label>
                  <input type="text" class="form-control" name="borrow_id" value="<?php echo $borrowid; ?>" disabled required>
              </div>

             
                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Member ID:</label>
                  <input type="text" class="form-control" name="member_id"  value="<?php echo $memberid; ?>" required>
                </div>


                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Date Borrowed:</label>
                  <input type="datetime-local" class="form-control" name="date_borrow"  value="<?php echo $dateborrow; ?>" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Due Date:</label>
                  <input type="text" class="form-control" name="due_date" value="<?php echo $duedate; ?>" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Borrow Details ID:</label>
                  <input type="text" class="form-control" name="borrow_details_id"  value="<?php echo $borrowdetailsid; ?>" required disabled>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Book ID:</label>
                  <input type="text" class="form-control" name="book_id"  value="<?php echo $bookid; ?>" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="status">Borrow Status:</label>
                  <select id="status" class="form-control" name="borrow_status"  value="<?php echo $borrowstatus; ?>" required>
                  <option value="pending" <?= ($row["borrow_status"] == "pending")? "selected" : "" ?>>pending</option>
                  <option value="returned" <?= ($row["borrow_status"] == "returned")? "selected" : "" ?>>returned</option>
                  </select>
                  </div>


                  <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Date Returned:</label>
                  <input type="datetime-local" class="form-control" name="date_return"  value="<?php echo $datereturn; ?>" required>
                </div>

                <div class="row justify-content-center">
                  <div class="col-md-5 mb-0 form-group text-center">
                    <input type="submit" onclick="" value="Update" class="btn btn-block btn-primary rounded-0 py-2 px-4" name="update">
                  </div>
                  <div class="col-md-5 mb-0 form-group text-center">
                    <input type="button" onclick="location.href='borrowdetailslist.php';"button class="btn btn-block btn-danger rounded-0 py-2 px-4" value="Go Back"></a>
                  </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>

