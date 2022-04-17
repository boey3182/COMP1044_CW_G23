<?php
require_once "config.php";


if(isset($_POST['submit'])){
  $booktitle=  $_REQUEST['booktitle'];
  $categoryid= $_REQUEST['category_id'];
  $bookauth= $_REQUEST['bookauthor'];
  $bookcopies= $_REQUEST['bookcopies'];
  $publisher= $_REQUEST['bookpublisher'];
  $pubname= $_REQUEST['publishername'];
  $isbn= $_REQUEST['bookisbn'];
  $copyrightyr= $_REQUEST['copyrightyr'];
  $dateadded=$_REQUEST['dateadded'];
      $dateadded= date("Y-m-d H:i:s",strtotime($dateadded));
  $status=$_REQUEST['status'];

  $link->query("INSERT INTO book (book_title,category_id,author,book_copies,book_pub,publisher_name,isbn,copyright_year,date_added,status) VALUES('$booktitle','$categoryid','$bookauth','$bookcopies','$publisher','$pubname','$isbn','$copyrightyr','$dateadded','$status')") or
   die($link->error);

   header("location:booklist.php");



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


    <title>Add a Book</title>
  </head>
  <body>
  
  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-8">
          <div class="form h-100 contact-wrap p-4">
            <h3 class="text-center">Add a Book</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">
    
                <div class="col-md-6 form-group mb-6">
                  <label for="" class="col-form-label">Book Title:</label>
                  <input type="text" class="form-control" name="booktitle" id="booktitle" required>

                <div class="form-group">
                  <label for="" class="col-form-label">Category:</label>
                  <select id="category_id" class="form-control" name="category_id" required>
                      <option value="1">1-Periodical</option>
                      <option value="2">2-English</option>
                      <option value="3">3-Math</option>
                      <option value="4">4-Science</option>
                      <option value="5">5-Encyclopedia</option>
                      <option value="6">6-Filipiniana</option>
                      <option value="7">7-Newspaper</option>
                      <option value="8">8-General</option>
                      <option value="9">9-References</option>
                  </select>
                  </div>
              </div>

             
                <div class="col-md-6 form-group mb-6">
                  <label for="budget" class="col-form-label">Book Author:</label>
                  <input type="text" class="form-control" name="bookauthor" id="bookauthor" required>
                </div>


                <div class="col-md-6 form-group mb-6">
                  <label for="budget" class="col-form-label">Book Copies:</label>
                  <input type="text" class="form-control" name="bookcopies" id="bookcopies" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="budget" class="col-form-label">Book Publisher:</label>
                  <input type="text" class="form-control" name="bookpublisher" id="bookpublisher" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="budget" class="col-form-label">Publisher Name:</label>
                  <input type="text" class="form-control" name="publishername" id="publishername" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label>Book ISBN:</label>
                  <input type="text" name="bookisbn" class="form-control" required>
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label>Copyright Year:</label>
                  <input type="text" name="copyrightyr" class="form-control" required>
                  </div>

                <div class="col-md-6 form-group mb-6">
                    <label for="birthdaytime">Date added:</label>
                    <input type="datetime-local" name="dateadded" class="form-control" required> 
                </div>

                <div class="col-md-6 form-group mb-6">
                  <label for="status"> Status:</label>
                  <select id="status" class="form-control" name="status" required>
                  <option value="New">New</option>
                  <option value="Old">Old</option>
                  <option value="Lost">Lost</option>
                  <option value="Old">Archive</option>
                  <option value="Damaged">Damaged</option>
                  </select>
                </div>

                <div class="row justify-content-center">
                  <div class="col-md-5 mb-0 form-group text-center">
                    <input type="submit" onclick="tell()" value="Add a Book" class="btn btn-block btn-primary rounded-0 py-2 px-4" name="submit">
                  </div>
                  <div class="col-md-5 mb-0 form-group text-center">
                    <input type="button" onclick="location.href='booklist.php';"button class="btn btn-block btn-danger rounded-0 py-2 px-4" value="Go Back"></a>
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


