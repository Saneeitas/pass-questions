<?php
session_start();

//check if logged in as user
// if($_SESSION["user"]["role"] == "user"){
//     header("location: all-questions.php");
// }

 //require "inc/process.php";
 require "inc/header.php";   
?>

 <div class="container">
    <?php require './pages/header-home.php'; ?>
    <div class="container-fluid my-3">
        <div class="row">
        <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="./img/PQ.jpeg" alt="" width="150" height="150">
    <h1 class="display-5 fw-bold" style="color: #3b7fad">Pass Questions</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly get access to all Pass Questions in different courses and sessions.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="register.php" class="btn btn-outline-secondary btn-lg px-4" >Get Started</a>
      </div>
    </div>
    </div>
  </div>
 </div>

 <?php require './pages/footer-home.php'; ?>

</div>


 <?php require "inc/footer.php"; ?>

