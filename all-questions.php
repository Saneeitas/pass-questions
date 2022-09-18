<?php

session_start();

if (!isset($_SESSION["user"])) {
  header("location: login.php");
}

require "inc/process.php";
require "inc/header.php";
?>

<div class="container">
    <?php require './pages/header-home.php'; ?>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-8">					
                <h2>ALL PASS QUESTIONS</h2>
                <div class="row">
                    <?php
          //displaying the products from database
          $sql = "SELECT * FROM questions ORDER BY id DESC";
          $query = mysqli_query($connection, $sql);
          while ($result = mysqli_fetch_assoc($query)) {
            //Looping through the col for multiples product
          ?>
                    <div class="col-4 mt-2">
                        <div class="card">
                            <img src="<?php echo $result["image"]; ?>" style="height:200px; width:100%"
                                class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $result["course_code"]; ?></h5>
                                <h5 class="card-title"><?php echo $result["session"]; ?></h5>
                                <a href="view-question.php?question_id=<?php echo $result["id"]; ?>" class="btn btn-sm"
                                    style="background-color:#3b7fad;"><i class="fas fa-eye"></i> View Question</a>
                            </div>
                        </div>
                    </div>
                    <?php
          }
          ?>
                </div>
            </div>
            <div class="col-4">
                <div class="border p-3 my-3">
                    <h4 class="list-group-item" style="color:#3b7fad;">
                        <i class="fas fa-grip-vertical"></i> COURSES
                    </h4>
                    <ul class="list-group">
                        <?php
            $sql_c = "SELECT * FROM courses ORDER BY id DESC";
            $query_c = mysqli_query($connection, $sql_c);
            while ($result_c = mysqli_fetch_assoc($query_c)) {
            ?>
                        <li class="list-group-item bg-light" style="background-color:#FF6347;">
                            <i class="fas fa-chevron-circle-right" style="color:#3b7fad;"></i>
                            <a href="course-category.php?course_category_id=<?php echo $result_c["id"]; ?>" class="btn">
                                <?php echo $result_c["name"] ?></a>
                        </li>
                        <?php
            }
            ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php require './pages/footer-home.php'; ?>
</div>





<?php
require "inc/footer.php";
?>