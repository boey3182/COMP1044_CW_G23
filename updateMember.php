<?php

require_once "config.php";
$firstname='';
$lastname='';
$gender='';
$address='';
$contact='';
$yearlevel='';
$status='';
$type_id='';
$id=0;

if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $result= $link->query("SELECT * FROM member WHERE member_id='$id'") or die($link->error());
    if($result->num_rows>0){
        $row=$result->fetch_array();
        $firstname= $row['firstname'];
        $lastname= $row['lastname'];
        $gender= $row['gender'];
        $address=$row['address'];
        $contact= $row['contact'];
        $yearlevel=$row['year_level'];
        $status=$row['status'];
        $type_id=$row['type_id'];
    }
}

if(isset($_POST['update'])){
  $id= $_POST['id'];
  $firstname= $_POST['firstname'];
  $lastname= $_POST['lastname'];
  $gender=$_POST['gender'];
  $address=$_POST['address'];
  $contact=$_POST['contact'];
  $yearlevel=$_POST['yearlevel'];
  $status=$_POST['status'];
  $type_id=$_POST['type_id'];

  $link->query("UPDATE member SET firstname='$firstname', lastname='$lastname', gender='$gender', address='$address', contact='$contact', year_level='$yearlevel', status='$status', type_id='$type_id' WHERE member_id='$id'") 
   or die($link->error());

   header("location: memberlist.php");

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


    <title>Edit a Member</title>
  </head>
  <body>
  
  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-8">
          <div class="form h-100 contact-wrap p-4">
            <h3 class="text-center">Edit a Member</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">

            <input type="hidden" name="id" value="<?php echo $id; ?>">
    
                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Firstname:</label>
                  <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>" required>
              </div>

             
                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Lastname:</label>
                  <input type="text" class="form-control" name="lastname"  value="<?php echo $lastname; ?>" required>
                </div>


                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Gender:</label>
                  <input type="text" class="form-control" name="gender"  value="<?php echo $gender; ?>" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Address:</label>
                  <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Contact:</label>
                  <input type="text" class="form-control" name="contact"  value="<?php echo $contact; ?>" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label>Year Level:</label>
                  <select id="yearlevel" class="form-control" name="yearlevel" value="<?php echo $yearlevel; ?>" required>
                  <option value="Faculty" <?= ($row["year_level"] == "Faculty")? "selected" : "" ?> >Faculty</option>
                  <option value="First Year" <?= ($row["year_level"] == "First Year")? "selected" : "" ?> >First Year</option>
                  <option value="Second Year" <?= ($row["year_level"] == "Second Year")? "selected" : "" ?> >Second Year</option>
                  <option value="Third Year" <?= ($row["year_level"] == "Third Year")? "selected" : "" ?> >Third Year</option>
                  <option value="Fourth Year" <?= ($row["year_level"] == "Fourth Year")? "selected" : "" ?> >Fourth Year</option>
                  </select>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="status">Status:</label>
                  <select id="status" class="form-control" name="status"  value="<?php echo $status; ?>" required>
                  <option value="Active" <?= ($row["status"] == "Active")? "selected" : "" ?>>Active</option>
                  <option value="Banned" <?= ($row["status"] == "Banned")? "selected" : "" ?>>Banned</option>
                  </select>
                  </div>


                <div class="col-md-6 form-group mb-6">
                  <label for="type_id"> TypeID:</label>
                  <select id="type_id" class="form-control" name="type_id" value="<?php echo $type_id; ?>" required>
                  <option value="2" <?= ($row["type_id"] == "2")? "selected" : "" ?> >2-Teacher</option>
                  <option value="20" <?= ($row["type_id"] == "20")? "selected" : "" ?> >20-Employee</option>
                  <option value="21" <?= ($row["type_id"] == "21")? "selected" : "" ?> >21-Non-Teaching</option>
                  <option value="22" <?= ($row["type_id"] == "22")? "selected" : "" ?> >22-Student</option>
                  <option value="32" <?= ($row["type_id"] == "32")? "selected" : "" ?> >32-Construction</option>
                  </select>
                </div>

                <div class="row justify-content-center">
                  <div class="col-md-5 mb-0 form-group text-center">
                    <input type="submit" onclick="" value="Update" class="btn btn-block btn-primary rounded-0 py-2 px-4" name="update">
                  </div>
                  <div class="col-md-5 mb-0 form-group text-center">
                    <input type="button" onclick="location.href='memberlist.php';"button class="btn btn-block btn-danger rounded-0 py-2 px-4" value="Go Back"></a>
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


