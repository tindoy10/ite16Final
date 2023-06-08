<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $subject_code = $_POST['subject_code'];
   $subject_name = $_POST['subject_name'];

   $sql = "INSERT INTO `subject_tbl`(`subject_id`, `subject_code`, `subject_name`) VALUES (NULL,'$subject_code','$subject_name')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: admin_index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="css/style.css">  
   <title>Add</title>
</head>

<body>
<div id="particles-js"></div>
   <header>
   <h1>Add</h1>
   <a href="logout.php" class="ghost">Logout</a>
   </header>

   <div class="container isWhite">
      <div class="text-center mb-4">
         <h4>Complete the form below to add a new entry</h4>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Subject Code</label>
                  <input type="text" class="form-control" name="subject_code" placeholder="ITE14">
               </div>

               <div class="col">
                  <label class="form-label">Subject Name</label>
                  <input type="text" class="form-control" name="subject_name" placeholder="Programming">
               </div>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="admin_index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <script src="js/particles.js"></script>
	<script src="js/app.js"></script>
</body>

</html>