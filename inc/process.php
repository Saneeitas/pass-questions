<?php

require "connection.php";

if(isset($_POST["register"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check = "SELECT * FROM users WHERE email = '$email'";
    $query_check = mysqli_query($connection,$sql_check);
    if(mysqli_fetch_assoc($query_check)){
        //user exists
        $error = "User already exist";
    }else{
         //insert into DB
        $sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$encrypt_password')";
        $query = mysqli_query($connection,$sql) or die("Cant save data");
        $success = "Registration successfully";
    }  
}

if(isset($_POST["login"])){

    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check2 = "SELECT * FROM users WHERE email = '$email'";
    $query_check2 = mysqli_query($connection,$sql_check2);
    if(mysqli_fetch_assoc($query_check2)){
       //check if email and password exist
       $sql_check = "SELECT * FROM users WHERE email = '$email' 
       AND password = '$encrypt_password'";
       $query_check = mysqli_query($connection,$sql_check);
          if($result = mysqli_fetch_assoc($query_check)){
                //Login to dashboard
                $_SESSION["user"] = $result;
                   if($result["role"] == "user"){
                       header("location: all-questions.php");            
                   }else{
                       header("location: dashboard.php");
                       } 
                      $success = "User logged in";       
          }else{ 
             //user password wrong
             $error = "User password wrong";
          }  
  }else{
      //user not found
      $error = "User email not found";
  } 
}

if(isset($_POST["add-course"])){
    $name = $_POST["name"];
    //sql
    $sql = "INSERT INTO courses(name) VALUES('$name')";
    $query = mysqli_query($connection,$sql);
    
    if($query){
        $success = "Course added";
    }else{
        $error = "Unable to add Course";
    }
}

if(isset($_GET["delete_course"]) && !empty($_GET["delete_course"])){
    $id = $_GET["delete_course"];
    //sql
    $sql = "DELETE FROM courses WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);

    if($query){
        $success = "course deleted";
    }else{
        $error = "Unable to delete course";
    }

}

if(isset($_POST["edit_course"])){
    $name = $_POST["name"];
    $edit_id = $_GET["edit_id"];
    //sql
    $sql = "UPDATE courses SET name = '$name' WHERE id = '$edit_id'";
    $query = mysqli_query($connection,$sql);
    if($query){
        $success = "course updated";
    }else{
        $error = "Unable to update course";
    }

}


if(isset($_POST["new_question"])){
    //uploading to upload folder
    $target_dir = "uploads/";
    $basename = basename($_FILES["image"]["name"]);
    $upload_file = $target_dir.$basename;
    //move uploaded file
    $move = move_uploaded_file($_FILES["image"]["tmp_name"],$upload_file);
    if($move){
        $url = $upload_file;
        $course_title = $_POST["course_title"];
        $course_code = $_POST["course_code"];
        $session = $_POST["session"];
        $course_id = $_POST["course_id"];
        $image = $url;
        //sql
        $sql = "INSERT INTO questions(course_title,course_code,session,course_id,image) 
                VALUES('$course_title','$course_code','$session','$course_id','$image')";
        $query = mysqli_query($connection,$sql);
        if($query){
           //success message
            $success = "Question Added";
        }else{
            $error = "Unable to add Question";
        }  
    }else{
        $error = "Unable to upload image";
    }
}

if(isset($_POST["update_question"])){
    $id = $_GET["edit_question_id"];
    if($_FILES["image"]["name"] != ""){
        //upload image
        $target_dir = "uploads/";
        $url = $target_dir.basename($_FILES["image"]["name"]);
        //move uploaded file
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$url)){
            //update to database
             //parameters 
            $course_title = $_POST["course_title"];
            $course_code = $_POST["course_code"];
            $session = $_POST["session"];
            //$course_id = $_POST["course_id"];
            $image = $url;    
            //sql
            $sql = "UPDATE questions SET course_title ='$course_title', course_code='$course_code', 
                    session='$session', image='$image'
                    WHERE id='$id' ";
            $query = mysqli_query($connection,$sql);
            //check if
            if($query){
                $success = "Question updated";
            }else{
                $error = "Unable to update Question";
            }
        }
    }else{
        //leave the upload image and
        //update to database
        //parameters 
        $course_title = $_POST["course_title"];
        $course_code = $_POST["course_code"];
        $session = $_POST["session"];
        //$course_id = $_POST["course_id"];   
        //sql
        $sql = "UPDATE questions SET course_title ='$course_title', course_code='$course_code', 
            session='$session' WHERE id='$id' ";
        $query = mysqli_query($connection,$sql);
        //check if
        if($query){
        $success = "Question updated";
        }else{
        $error = "Unable to update question";
        }

    }
}

if(isset($_GET["delete_question"]) && !empty($_GET["delete_question"])){
    $id = $_GET["delete_question"];
    //sql
    $sql = "DELETE FROM questions WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    //check if
    if($query){
        $success = "Question deleted successfully";
    }else{
        $error = "Unable to delete Question";
    }
}



?>