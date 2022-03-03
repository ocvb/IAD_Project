<?php
include_once "../db.php";

$array = array('ID', 'Name', 'Course', 'Email', 'Phone');
$dbarray = array('regid', 'name', 'course', 'email', 'hp_no');

$email = $_COOKIE['user'];
$query = "SELECT `regid`, `name`, `course`, `email`, `hp_no`, `reg_date` FROM members";
$result = mysqli_query($db, $query);

function course_seats($id)
{
   global $db;
   $sql = "SELECT seats FROM course WHERE course_id = $id";
   $result = mysqli_query($db, $sql);
   $row = mysqli_fetch_array($result);
   return $row['seats'];
}
function td($i) {
   return "<td>$i</td>";
}
function th($i) {
   return "<th scope='row'>$i</th>";
}

if (isset($_POST['delete'])) {
   $id = $_POST['id'];
   $query = "SELECT course FROM members WHERE regid = $id";
   $row = mysqli_fetch_array(mysqli_query($db, $query));
   $course = $row['course'];

   $query = "DELETE FROM `members` WHERE regid = $id";
   if (mysqli_query($db, $query)) {
      echo "<p>$course</p>";
      $checkSeats = course_seats($course) + 1;
      $query = "UPDATE course SET seats = $checkSeats WHERE course_id = $course";
      mysqli_query($db, $query);
   }
   header("Refresh: 0");
}
?>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" type="text/css">
   <link rel="stylesheet" href="../css/style.css" type="text/css">
   <link rel="stylesheet" href="../css/account.css" type="text/css">
   <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
</head>

<body>
   <div id="preloader"></div>
   <!--TODO: Header, Nav, Article, Aside-->
   <nav>
      <ul class="nav d-flex justify-content-center align-items-center  fixed-top navaddpage">
         <li class="nav-item"><a class="nav-link" href="../index.html">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="../course.php">Course</a></li>
         <li class="nav-item"><a class="nav-link" href="../account.php"><i class="fa-solid fa-user"></i></a></li>
      </ul>
   </nav>

   <div class="container-bg">
      <div class="container dynamic-table justify-content-center">
         <nav>
            <ul class="nav list-unstyled bg-transparent">
               <li class="nav-item account-item"><a id='viewphp' class="nav-link" href="admin.php">View</a></li>
               <li class="nav-item account-item"><a id='insert' class="nav-link" href="insert.php">Insert</a></li>
               <li class="nav-item account-item"><a id="updatephp" class="nav-link" href="update.php">Update</a></li>
               <li class="nav-item account-item"><a id="deletephp" class="nav-link" href="delete.php">Delete</a></li>
            </ul>
            <hr class="text-white" width="320px" style="height: 3px;">
         </nav>

         <div class="container data text-white delete">
            <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
            <form method="POST">
               <table class="table text-center text-white">
                  <tr>
                     <th scope="row">ID</th>
                     <td scope="col">Name</td>
                     <td scope="col">Course</td>
                     <td scope="col">Email</td>
                     <td scope="col">Phone</td>
                  </tr>
                  <?php
                  while ($row = mysqli_fetch_array($result)) {
                     //echo "<tr>" . td($row[$dbarray[$i]]) . "</tr>";
                     echo "<tr>" . th($row[$dbarray[0]]) . td($row[$dbarray[1]]) . td($row[$dbarray[2]]) . td($row[$dbarray[3]]) . td($row[$dbarray[4]]) . "</tr>";
                  }
                  ?>
               </table>
               <table>
                  <tr>
                     <td class="text-white">Please enter member ID to delete: <input type="number" name="id" autofocus='autofocus'></td>
                     <td><input type="submit" name="delete" value="Delete"></td>
                  </tr>
               </table>
            </form>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <script src="../js/script.js"></script>
</body>