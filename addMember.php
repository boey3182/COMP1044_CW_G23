<?php
require_once "config.php";


if(isset($_POST['submit'])){
  $firstname=$_REQUEST['firstname'];
  $lastname=$_REQUEST['lastname'];
  $gender=$_REQUEST['gender'];
  $address=$_REQUEST['address'];
  $contact=$_REQUEST['contact'];
  $yearlevel=$_REQUEST['yearlevel'];
  $status=$_REQUEST['status'];
  $typeid=$_REQUEST['type_id'];

  $link->query("INSERT INTO member (firstname,lastname,gender,address,contact,year_level,status,type_id) VALUES('$firstname','$lastname','$gender','$address','$contact','$yearlevel','$status','$typeid')") or 
   die($link->error);

   header("location:memberlist.php");



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


    <title>Add a Member</title>
  </head>
  <body>
  
  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-8">
          <div class="form h-100 contact-wrap p-4">
            <h3 class="text-center">Add a Member</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">
    
                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Firstname:</label>
                  <input type="text" class="form-control" name="firstname" id="firstname" required>
              </div>

             
                <div class="col-md-6 form-group mb-6">
                  <label for="budget" class="col-form-label">Lastname:</label>
                  <input type="text" class="form-control" name="lastname" id="lastname" required>
                </div>


                <div class="col-md-6 form-group mb-6">
                  <label for="budget" class="col-form-label">Gender:</label>
                  <input type="text" class="form-control" name="gender" id="gender" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="budget" class="col-form-label">Address:</label>
                  <input type="text" class="form-control" name="address" id="address" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="budget" class="col-form-label">Contact:</label>
                  <input type="text" class="form-control" name="contact" id="contact" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label>Year Level:</label>
                  <select id="status" class="form-control" name="yearlevel" required>
                  <option value="Faculty">Faculty</option>
                  <option value="First Year">First Year</option>
                  <option value="Second Year">Second Year</option>
                  <option value="Third Year">Third Year</option>
                  <option value="Fourth Year">Fourth Year</option>
                  </select>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="status">Status:</label>
                  <select id="status" class="form-control" name="status" required>
                  <option value="active">Active</option>
                  <option value="banned">Banned</option>
                  </select>
                  </div>


                <div class="col-md-6 form-group mb-6">
                  <label for="type_id"> TypeID:</label>
                  <select id="type_id" class="form-control" name="type_id" required>
                  <option value="2">2-Teacher</option>
                  <option value="20">20-Employee</option>
                  <option value="21">21-Non-Teaching</option>
                  <option value="22">22-Student</option>
                  <option value="32">32-Construction</option>
                  </select>
                </div>

                <div class="row justify-content-center">
                  <div class="col-md-5 mb-0 form-group text-center">
                    <input type="submit" onclick="" value="Add a Member" class="btn btn-block btn-primary rounded-0 py-2 px-4" name="submit">
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


