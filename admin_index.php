<?php
include "db_conn.php";
include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Schedules</title>
</head>

<body>
<div id="particles-js"></div>

<header>
  <h1>Admin</h1>
  <a href="add-subject.php" class="ghost">Add Subject</a>
  <a href="add-event.php" class="ghost">Add Event</a>
  <a href="logout.php" class="ghost">Logout</a>
</header>



  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Building Name</th>
          <th scope="col">Room Number</th>
          <th scope="col">Subject Code</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM event_tbl e INNER JOIN subject_tbl s ON e.subject_id = s.subject_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["event_id"] ?></td>
            <td><?php echo $row["building_name"] ?></td>
            <td><?php echo $row["room_number"] ?></td>
            <td><?php echo $row["subject_code"] ?></td>
            <td><?php echo $row["event_date"] ?></td>
            <td><?php echo $row["event_time"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["event_id"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="delete.php?id=<?php echo $row["event_id"] ?>"><i class="fa-solid fa-delete-left"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="js/particles.js"></script>
	<script src="js/app.js"></script>
</body>

</html>